namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DetectAndStoreTimezone
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $ip = $request->ip();

            $response = file_get_contents("http://ip-api.com/json/{$ip}");
            $data = json_decode($response);

            if (isset($data->timezone)) {
                $timezone = $data->timezone;

                $user = Auth::user();
                if (!$user->timezone) {
                    $user->timezone = $timezone;
                    $user->save();
                }
            }
        }

        return $next($request);
    }
}
