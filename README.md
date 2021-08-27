# Laravel Dasar
Website untuk mengelola data company dan employee menggunakan laravel.\
Project menggunakan laravel/ui packages dengan bootstrap untuk tampilan dasar.\
Jalankan perintah berikut apabila tampilan bootstrap tidak muncul\
`npm install`\
`npm run dev`\
Project menggunakan Database seeder untuk mengisikan data kedalam database guna testing.\
Database seeder berisi:
1. Seed user admin dengan email: admin@transisi.id dan password: transisi.
2. Factory untuk mengenerate data company dengan menggunakan faker.
3. Factory untuk employee menggunakan faker.
4. Apabila ingin data faker berbahasa indonesia silahkan tambahkan `FAKER_LOCALE=id_ID` kedalam file .env

Project menggunakan jQuery di beberapa bagian.\
Gunakan koneksi internet apabila ingin jQuery berjalan, karena hanya menggunakan CDN.
