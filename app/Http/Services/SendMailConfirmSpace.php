<?php
namespace App\Http\Services;
use App\Enums\UserHasRole;
use App\Models\confirm_member;
use App\Models\Spaces;
use App\Models\SpaceUser;
use App\Models\User;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use mysql_xdevapi\Collection;

class SendMailConfirmSpace
{
    public function sendMailConfirmMember(Request $request,Spaces $spaces)
    {

        $this->sendMailMember($request->all(),$spaces);

        die();

    }

    public function acceptAccede( Request $request,string $token)
    {
        try {
            $code = $request->query('code');
            $email = $request->query('email');

            $member = confirm_member::where('token', $token)
                ->where('space_code', $code)
                ->where('email_member', $email)
                ->first();

            $space = Spaces::select('id')->where('code',$code)->first();
            $user = User::select('id')->where('email',$email)->first();

            $member_exist = SpaceUser::query()->where('spaces_id', $space->id)
                ->where('user_id', $user->id)->first();
            if ($member_exist != null){
                return redirect()->route('spaces.show',$code);
            }
            if($member != null){
                SpaceUser::create([
                    'spaces_id' => $space->id,
                    'user_id' => $user->id,
                    'role_space_id' => UserHasRole::member->value
                ]);
                $member->delete();
                return redirect()->route('spaces.show',$code);
            }else{
                return redirect()->route('home');
            }
        }catch (\Exception $e){
            session()->flash('error', 'Lỗi hệ thống, vui lòng gửi lại sau');
            return back();
        }
    }


    public function sendMailMember(array $request ,Spaces $spaces)
    {
        $token = Str::random(15);
        try {
            $member = confirm_member::create([
                'token' => $token,
                'space_code' => $spaces->code,
                'email_member' => $request['email_member']
            ]);
            Mail::send('sendMail.sendMailConfirmMember',compact(['member','spaces']),function ($email) use ($member){
                $email->subject('Xác nhận tham gia không gian làm việc !');
                $email->to($member->email_member);
            });
            return redirect()->route('spaces.show',$spaces->code);
        }catch (\Exception $e){
            session()->flash('error', 'Lỗi hệ thống, vui lòng gửi lại sau');
            return back();
        }
    }
}
