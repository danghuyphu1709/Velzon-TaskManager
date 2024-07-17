<?php
namespace App\Http\Services;
use App\Enums\UserHasRole;
use App\Events\sendMailConfirmMemberEvent;
use App\Models\confirm_member;
use App\Models\Spaces;
use App\Models\SpaceUser;
use App\Models\User;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class SendMailConfirmSpace
{
    public function validateSendMail(Request $request,Spaces $spaces)
    {

        // kiểm tra xem lời mời đã được gửi chưa ?
        $acceptTokenExists  = confirm_member::query()->where('email_member',$request->email_member)
            ->where('space_code',$spaces->code)
            ->exists();
        if ($acceptTokenExists){
            session()->flash('alert-error', 'Bạn đã gửi lời mời trước đó !');
            return redirect()->route('khong-gian.show',$spaces->code);
        }

        $user = User::select('id')->where('email',$request->email_member)->first();
        // kiểm tra xem đã tham gia chưa đã được gửi chưa ?
        $acceptSpaceExists = SpaceUser::query()->where('spaces_id',$spaces->id)
            ->where('user_id',$user->id)
            ->exists();

        // chạy sendMail
        if(!$acceptSpaceExists){
            DB::beginTransaction();
            $confirmMember = $this->sendToEmail($request->all(),$spaces);
            if($confirmMember['status']){
                session()->flash('alert-success', 'Lời mời đã được gửi !');
                DB::commit();
                return redirect()->route('khong-gian.show',$spaces->code);
            }else{
                DB::rollBack();
                session()->flash('error',$confirmMember['message']);
                return redirect()->route('khong-gian.show',$spaces->code);
            }
        }else{
            session()->flash('alert-error', 'Người dùng đã tham gia không gian làm việc !');
            return redirect()->route('khong-gian.show',$spaces->code);
        }
    }

    public function acceptAccede( Request $request,string $token)
    {
        try {
            DB::beginTransaction();
            $code = $request->query('code');
            $email = $request->query('email');

            $member = confirm_member::where('token', $token)
                ->where('space_code', $code)
                ->where('email_member', $email)
                ->first();

            $space = Spaces::select('id')->where('code',$code)->first();
            $user = User::select('id')->where('email',$email)->first();
            if($member != null){
                SpaceUser::create([
                    'spaces_id' => $space->id,
                    'user_id' => $user->id,
                    'role_space_id' => UserHasRole::member->value
                ]);
                $member->delete();
                DB::commit();
                return redirect()->route('khong-gian.show',$code);
            }else{
                return redirect()->route('home');
            }
        }catch (\Exception $e){
            DB::rollBack();
            session()->flash('error', 'Lỗi hệ thống, vui lòng gửi lại sau');
            return back();
        }
    }

    public function sendToEmail(array $request,Spaces $spaces)
    {
        try {
            $token = Str::random(15);
            $member = confirm_member::create([
                'token' => $token,
                'space_code' => $spaces->code,
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
