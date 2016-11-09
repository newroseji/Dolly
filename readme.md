##Steps
1. composer.json
"laracasts/dolly":"dev-master"

2. config/app.php
Laracasts\Dolly\DollyServiceProvider::class

3. composer update

4. app/Http/Kernel.php
Inside web of $middlewareGroups
\Laracasts\Dolly\FlushViews::class

5. app/Card.php
use Laracasts\Dolly\Cacheable;

7. app/Note.php
use Laracasts\Dolly\Cacheable;