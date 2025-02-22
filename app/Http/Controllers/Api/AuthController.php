<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Create User
     * @param Request $request
     * @return User 
     */
    public function RegisterUser(Request $request)
    {
        try {
            //  Kiểm tra đầu vào
            $validateUser = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required',
                'role' => 'required|in:Admin,Customer' // Chỉ cho phép 2 role
            ]);
    
            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }
    
            //  Tạo user
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role // Gán role
            ]);
    
            return response()->json([
                'status' => true,
                'message' => 'Tạo tài khoản thành công ',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);
    
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
    

    /**
     * Login The User
     * @param Request $request
     * @return User
     */
    public function loginUser(Request $request)
    {
        try {
            //  Kiểm tra đầu vào
            $validateUser = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required'
            ]);
    
            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }
    
            //  Kiểm tra đăng nhập
            if (!Auth::attempt($request->only(['email', 'password']))) {
                return response()->json([
                    'status' => false,
                    'message' => 'Email & Password không trùng với bản ghi.',
                ], 401);
            }
    
            //  Lấy thông tin user
            $user = Auth::user();
    
            //  Xác định URL chuyển hướng dựa vào role
            $redirect_url = $user->role === 'Admin' ? '/users' : '/home';
    
            return response()->json([
                'status' => true,
                'message' => 'User Logged In Successfully',
                'role' => $user->role, // Gửi role về FE
                'redirect_url' => $redirect_url, // URL điều hướng
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);
    
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
    








    

    public function changePassword(Request $request)
    {
        try {
            // Lấy user đăng nhập
            $user = Auth::user();
    
            if (!$user) {
                return response()->json([
                    'status' => false,
                    'message' => 'Unauthorized - không tìm thấy tài khoản '
                ], 401);
            }
    
            // Kiểm tra đầu vào
            $validateUser = Validator::make($request->all(), [
                'current_password' => 'required',
                'new_password' => 'required|min:6|confirmed',
            ]);
    
            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }
    
            // Kiểm tra mật khẩu hiện tại có đúng không
            if (!Hash::check($request->current_password, $user->password)) {
                return response()->json([
                    'status' => false,
                    'message' => 'Mật khẩu hiện tại không chính xác '
                ], 400);
            }
    
            // Cập nhật mật khẩu mới
            $user->update(['password' => Hash::make($request->new_password)]); // Dùng update() thay vì save()
    
            return response()->json([
                'status' => true,
                'message' => 'Thay đổi mật khẩu thành công '
            ], 200);
    
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
    

    

    public function forgotPassword(Request $request)
    {
        try {
            //  Kiểm tra email nhập vào có hợp lệ không
            $request->validate([
                'email' => 'required|email|exists:users,email',
            ]);
    
            //  Gửi link reset mật khẩu đến email của người dùng
            $status = Password::sendResetLink($request->only('email'));
    
            //  Kiểm tra xem email có được gửi thành công hay không
            if ($status === Password::RESET_LINK_SENT) {
                return response()->json([
                    'status' => true,
                    'message' => 'Liên kết đặt lại mật khẩu được gửi đến email của bạn '
                ], 200);
            }
    
            //  Nếu có lỗi khi gửi email
            return response()->json([
                'status' => false,
                'message' => __($status)
            ], 400);
    
        } catch (\Throwable $th) {
            //  Xử lý lỗi hệ thống (nếu có)
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

/**

 */
public function resetPassword(Request $request)
{
    try {
        //  Kiểm tra dữ liệu đầu vào
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'token' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        //  Xử lý reset password
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                //  Cập nhật mật khẩu mới vào database
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->save();
            }
        );

        //  Kiểm tra xem password có được đặt lại thành công không
        if ($status === Password::PASSWORD_RESET) {
            return response()->json([
                'status' => true,
                'message' => 'Mật khẩu được đặt lại thành công'
            ], 200);
        }

        //  Nếu có lỗi khi đặt lại mật khẩu
        return response()->json([
            'status' => false,
            'message' => __($status)
        ], 400);

    } catch (\Throwable $th) {
        //  Xử lý lỗi hệ thống (nếu có)
        return response()->json([
            'status' => false,
            'message' => $th->getMessage()
        ], 500);
    }
}



//Đăng xuất
public function logout(Request $request)
{
    try {
        $user = Auth::user();

        if (!$user) {
            return response()->json(['message' => 'Không tìm thấy người dùng hoặc đã đăng xuất'], 401);
        }

        // Xóa token của user hiện tại (chỉ đăng xuất thiết bị hiện tại)
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'status' => true,
            'message' => 'Đăng xuất thành công '
        ], 200);
    } catch (\Throwable $th) {
        return response()->json([
            'status' => false,
            'message' => $th->getMessage()
        ], 500);
    }
}








//Lấy thông tin người dùng
public function profile()
{
    try {
        // Lấy thông tin user hiện tại
        $user = Auth::user();

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Hồ sơ người dùng đã được lấy lại thành công',
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->role,
                'created_at' => $user->created_at,
                'updated_at' => $user->updated_at
            ]
        ], 200);
    } catch (\Throwable $th) {
        return response()->json([
            'status' => false,
            'message' => $th->getMessage()
        ], 500);
    }
}




}