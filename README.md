# Loops Technical Test - [loops-technical-test.herokuapp.com](https://loops-technical-test.herokuapp.com/)

Ini adalah jawaban untuk tes teknikal dari Loops.id. Semua jawaban dibawah, berdasarkan [soal](https://github.com/hapakaien/loops-technical-test/blob/main/loopstask.pdf) terlampir.

## Jawaban

1. [Migration](https://github.com/hapakaien/loops-technical-test/tree/main/database/migrations) sesuai ERD.
2. [Model](https://github.com/hapakaien/loops-technical-test/tree/main/app/Models) Eloquent sesuai ERD.
3. [Model Factory](https://github.com/hapakaien/loops-technical-test/tree/main/database/factories) sesuai ERD.
4. [Model Observer](https://github.com/hapakaien/loops-technical-test/tree/main/app/Observers) untuk Model Eloquent.
5. Eloquent query:
    a. [Content Post](https://github.com/hapakaien/loops-technical-test/blob/4bd1542ced8f7f0b4661fa23a617c453521f5ad4/app/Http/Controllers/ContentPost.php#L20) dengan email dan name penulisnya
    b. [User List](https://github.com/hapakaien/loops-technical-test/blob/4bd1542ced8f7f0b4661fa23a617c453521f5ad4/app/Http/Controllers/UserList.php#L20) dengan comment dari usernya
    c. [Comment Guest](https://github.com/hapakaien/loops-technical-test/blob/4bd1542ced8f7f0b4661fa23a617c453521f5ad4/app/Http/Controllers/CommentGuest.php#L20) yang usernya tidak terdaftar di sistem
6. Tampilan dari hasil query menggunakan blade:
a. Menggunakan layout
