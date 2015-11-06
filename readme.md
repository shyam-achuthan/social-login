## Social Login on Laravel PHP Framework

Before Running the code do db migrations and also copy .env.example to .env and change necessary settings in .env file including client id, secret and redirects for social logins.
If same email id repeats with other social login it will update the socialid in respective field ( googleid, facebookid ) etc.
If email is already registered via social network initially then email registration will be prevented thereafter for the corresponding.

### Recommended Changes
A well interfaced social media login classes which can be injected to a custom Authentication service provider.
