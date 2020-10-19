# Loops Technical Test - [loops-technical-test.herokuapp.com](https://loops-technical-test.herokuapp.com/)

Ini adalah jawaban untuk tes teknikal dari Loops.id. Semua jawaban dibawah, berdasarkan [soal](https://github.com/hapakaien/loops-technical-test/blob/main/loopstask.pdf) terlampir.

## Jawaban

#### 1. [Migration](https://github.com/hapakaien/loops-technical-test/tree/main/database/migrations) sesuai ERD.
#### 2. [Model](https://github.com/hapakaien/loops-technical-test/tree/main/app/Models) Eloquent sesuai ERD.
#### 3. [Model Factory](https://github.com/hapakaien/loops-technical-test/tree/main/database/factories) sesuai ERD.
#### 4. [Model Observer](https://github.com/hapakaien/loops-technical-test/tree/main/app/Observers) untuk Model Eloquent.
#### 5. Eloquent query:
- [Content Post](https://github.com/hapakaien/loops-technical-test/blob/4bd1542ced8f7f0b4661fa23a617c453521f5ad4/app/Http/Controllers/ContentPost.php#L20) dengan email dan name penulisnya
- [User List](https://github.com/hapakaien/loops-technical-test/blob/4bd1542ced8f7f0b4661fa23a617c453521f5ad4/app/Http/Controllers/UserList.php#L20) dengan comment dari usernya
- [Comment Guest](https://github.com/hapakaien/loops-technical-test/blob/4bd1542ced8f7f0b4661fa23a617c453521f5ad4/app/Http/Controllers/CommentGuest.php#L20) yang usernya tidak terdaftar di sistem
#### 6. Tampilan dari hasil query menggunakan blade:
- Menggunakan [layout](https://github.com/hapakaien/loops-technical-test/tree/main/resources/views/layouts)
- Menggunakan [includes](https://github.com/hapakaien/loops-technical-test/blob/9011f02b524c647b497888c898c45503aae6d7a3/resources/views/layouts/app.blade.php#L9)
- Menggunakan [flash message](https://github.com/hapakaien/loops-technical-test/blob/9011f02b524c647b497888c898c45503aae6d7a3/resources/views/content-post.blade.php#L5)
#### 7. Buat [seeder](https://github.com/hapakaien/loops-technical-test/tree/main/database/seeders) untuk setiap modelnya.
#### 8. Pendekatan dalam pengembangan:

Dalam pengembangan aplikasi ini, saya memilih untuk menggunakan Docker sebagai alat development. Docker sudah jadi hal yang umum. Dengan menggunakan docker, akan menghilangkan kebiasan "tidak jalan di tempat saya". Selama development, saya juga menggunakan Docker Compose. Jadi, semua container bisa jalan dengan satu perintah. Untuk mempermudah deployment ke production, saya juga membuat 1 file Dockerfile untuk PHP dan Nginx yang bertugas "membungkus" aplikasi ini. Dockerfile ini juga saya gunakan untuk salah satu service di Docker Compose. Jadi, baik di development maupun di production, bisa menggunakan container yang sama. 

Di Docker Compose, saya menggunakan Postgres sebagai database, Redis sebagai database-based session, dan Minio sebagai S3 Object storage. Saya pilih Postgres dan Redis karena ketersediaan image yang dibangun diatas Alpine Linux. Dengan image berbasis Alpine Linux, penggunaan sumber daya selama development bisa dipangkas. Saya pilih Minio, karena penggunanya sudah banyak. Meski, belum ada penggunaan upload di aplikasi ini, setidaknya ini bisa jadi persiapan untuk masa mendatang. Jadilah, di environtment tingkat development semakin mirip dengan production.

Mengikuti tren yang ada, saya menggunakan [Tall stack](https://tallstack.dev/) sebagai solusi development. Dengan Tall stack, saya bisa menggunakan view berbasis component. Sebuah metode yang dipopulerkan oleh banyak framework JavaScript, seperti Vue dan React. View bisa jadi lebih tertata, karena dengan component, penulisan kode duplikat berulang pada view bisa dihilangkan.

Untuk deployment, saya memilih Heroku karena gratis. Meski dengan segala keterbatasan yang ada. Saya juga menggunakan [GitHub Actions](https://github.com/hapakaien/loops-technical-test/actions) untuk CI/CD. Jadi, pendistribusian kode bisa lebih cepat. Saya hanya perlu push commit ke branch yang ditentukan, kode bisa langsung di-build, tes, dan deploy ke Heroku.

#### 9. Kekurangan:
- Fitur
    - ERD seharusnya bisa diubah jadi lebih optimal. Seperti relasi antara user dan post harusnya many-to-many supaya user tertentu dapat berkontribusi ke post tertentu. Antara user dan comment, seharusnya ada relasi one-to-many, dengan user_id di comment dibuat opsional. 
- Performa
    - Dengan ERD yang ada, kecepatan akses jadi sedikit lebih lambat.
    - Karena penggunaan view (konvensional), aplikasi juga jadi lambat. Hal ini bisa diatasi dengan cara memisahkan antara backend dan frontend.
    - Karena tidak ada aturan untuk menggunakan session dan database yang terpisah dengan aplikasi, sudah tentu akses akan lebih lambat jika dibandingkan dengan aplikasi yang terpisah dengan session dan database.
    - Penggunaan Eloquent Query untuk mengambil banyak data juga tidak disarankan. Apalagi tanpa adanya pagination. Hal ini juga bisa memperlambat akses.
- Kualitas Kode
    - Penggunaan Observer di aplikasi sesederhana ini, saya rasa berlebihan. Seharusnya event biasa sudah cukup. Dengan begitu, kode bisa dipangkas. 
