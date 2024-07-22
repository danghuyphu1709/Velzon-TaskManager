<?php
namespace App\Http\Services;
use App\Enums\UserHasRole;
use App\Events\sendMailConfirmMemberEvent;
use App\Models\confirm_member;
use App\Models\Tables;
use App\Models\TableUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Str;

class SendMailConfirmSpace
{
    public function validateSendMail(Request $request,Tables $tables)
    {
        // kiểm tra xem lời mời đã được gửi chưa ?
        $acceptTokenExists  = confirm_member::query()->where('email_member',$request->email_member)
            ->where('table_code',$tables->code)
            ->exists();
        if ($acceptTokenExists){

            return redirect()->back()->with('alert-error', 'Lời mời đã được gửi trước đó!');

        }
        $user = User::select('id')->where('email',$request->email_member)->first();
        // kiểm tra xem đã tham gia chưa đã được gửi chưa ?
        if(!empty($user)){
            $acceptSpaceExists = TableUser::query()->where('tables_id',$tables->id)
                ->where('user_id',$user->id)
                ->exists();
        }
        // chạy sendMail
        if(!isset($acceptSpaceExists) || empty($acceptSpaceExists)){
            DB::beginTransaction();
            $confirmMember = $this->sendToEmail($request->all(),$tables);
            if($confirmMember['status']){
                session()->flash('alert-success', 'Lời mời đã được gửi !');
                DB::commit();
                return redirect()->route('tables.index',$tables->code);
            }else{
                DB::rollBack();
                session()->flash('error',$confirmMember['message']);
                return redirect()->route('tables.index',$tables->code);
            }
        }else{
            session()->flash('alert-error', 'Người dùng đã tham gia không gian làm việc !');
            return redirect()->route('tables.index',$tables->code);
        }
    }

    public function acceptAccede(Request $request,string $token)
    {
        try {
            DB::beginTransaction();
            $code = $request->query('code');
            $email = $request->query('email');
            $member = confirm_member::where('token', $token)
                ->where('table_code', $code)
                ->where('email_member', $email)
                ->first();

            $tables = Tables::select('id')->where('code',$code)->first();
            $user = User::select('id')->where('email',$email)->first();
            if($member != null){
                TableUser::create([
                    'tables_id' => $tables->id,
                    'user_id' => $user->id,
                    'roles_id' => UserHasRole::member->value
                ]);
                $member->delete();
                DB::commit();
                return redirect()->route('tables.index',$code);
            }else{
                return redirect()->route('home');
            }
        }catch (\Exception $e){
            DB::rollBack();
            session()->flash('error', 'Lỗi hệ thống, vui lòng gửi lại sau');
            return back();
        }
    }

    public function sendToEmail(array $request,Tables $tables)
    {
        try {
            $token = Str::random(15);
            $member = confirm_member::create([
                'token' => $token,
                'table_code' => $tables->code,
                'email_member' => $request['email_member']
            ]);
            sendMailConfirmMemberEvent::dispatch($member);
            return ['status'=>true , 'data' => $member];
        }catch (\Exception $e){
            Log::debug($e);
            return ['status'=>false , 'message' => 'Lỗi hệ thống, vui lòng gửi lại sau'];
        }

    }
}
