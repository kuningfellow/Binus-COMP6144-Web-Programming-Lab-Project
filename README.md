<h2> Proyek Lab Web Programming </h2>
<h3> COMP6144 </h3>

Binus University<br>
Proyek Lab Web Programming<br>
Semester 5<br>

Nama: William Gunawan Eka<br>
NIM: 2101664132<br>
Kelas: BM-01<br>

Notes:
<ul>
  <li>This website uses middlewares so visual element validation (disabling buttons, etc) doesn't add much to security or authentification</li>
  <li>On the "update user" page, I intentionally allowed the "password" and "profile" fields to be empty. Validation is performed when the fields are filled. This is because I think it is better if users aren't forced to fill in the same password or profile picture when they do not want to change it. Fortunately, other fields support recalling old data so it isn't necessary to apply such exceptions. If it's really needed, just replace the "if" conditions on function "DBupdate" in "Bjora/app/Http/Controllers/UserController.php" to "TRUE"</li>
  <li>Does not include ".env" file, so copy it and generate the needed keys</li>
  <li>Link database and public storage using "php artisan storage:link"</li>
</ul>
