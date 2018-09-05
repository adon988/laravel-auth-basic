<?php
/*
 |-------------------------------------
 | JWT Auth 註冊, 登入
 |------------------------------------- 
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\User;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['register', 'login']]);
    }

    /**
     * Register User
     * 
     * @param Request $request
     * @return Response Json
     */
    public function register(Request $request)
    {
      if ($token = auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
        return response()->json(['error' => '帳號已存在'], 404);
      }
      
      $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
      ]);
      
      $token = auth()->login($user);

      return $this->respondWithToken($token);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
      $credentials = $request->only(['email', 'password']);

      // Generate a token for the user if the credentials are valid and adding custom claims
      if (!$token = auth()->claims(['auth' => 'adam'])->attempt($credentials)) {
        return response()->json(['error' => 'Unauthorized'], 401);
      }

      return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        // Pass true as the first param to force the token to be blacklisted "forever".
        // The second parameter will reset the claims for the new token
        $newToken = auth()->refresh(true, true);
        return $this->respondWithToken($newToken);
    }

    /**
     * JWT-Auth Response With token
     * 
     * @param string $token
     * @return Response Json
     */
    protected function respondWithToken($token)
    {
      return response()->json([
        'access_token' => $token,
        'token_type' => 'bearer',
        'expires_in' => auth()->factory()->getTTL() * 60
      ]);
    }
}
