##Steps
1. composer.json
"dhukuti/dolly":"dev-master"

2. config/app.php
Dhukuti\Dolly\DollyServiceProvider::class

3. composer update

4. app/Http/Kernel.php
Inside web of $middlewareGroups
\Dhukuti\Dolly\FlushViews::class

5. app/Card.php
use Dhukuti\Dolly\Cacheable;

7. app/Note.php
use Dhukuti\Dolly\Cacheable;