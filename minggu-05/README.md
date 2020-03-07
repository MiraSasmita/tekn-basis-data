#Minggu 05

![Gambar 1](gambar-01.png)

---

![Gambar 2](gambar-02.png)

---

![Gambar 3](gambar-03.png)

---

![Gambar 4](gambar-04.png)

---

![Gambar 5](gambar-05.png)

---

![Gambar 6](gambar-06.png)

---

![Gambar 7](gambar-07.png)

---

![Gambar 8](gambar-08.png)

----

![Gambar 9](gambar-09.png)

---

![Gambar 10](gambar-10.png)

----

untuk mengatur nilai string pada redis yaitu menggunakan STRING.
pada gambar dibawah user akan melakukan hal sama pada shell python dengan membuat instance dari StrictRedis. dengan menampilkan "mykey" yang diset menggunakan redis-cli dari python.sementara  Output menampilkan hasil yang sama pada redis dimana python dapat berkomunikasi dengan benar dengan redis-server

----

user mengatur nilai ke redis dari python shell
![Gambar 11](gambar-11.png)

---

memeriksa apakah kunci disetel dengan benar dari redis-cli
![Gambar 12](gambar-12.png)

---

dpat dilihat pada output python dapat memasukkan nilai ke dalam redis dengan benar
![Gambar 13](gambar-13.png)

---

menetapkan nilai integer. yang telah disediakan redis dengan iNCR dan INCRBY
![Gambar 14](gambar-14.png)

---

setara dengan redis-py dari redis incr
![Gambar 15](gambar-15.png)

---

menampilkan untuk memverifikasi bahwa num telah bertambah
![Gambar 16](gambar-16.png)

---

mengetes dengan redis-cli untuk memastikan nilai bertambah
![Gambar 17](gambar-17.png)

---

setara python dengan incrby
![Gambar 18](gambar-18.png)

----

![Gambar 19](gambar-19.png)

---

mengetes dengan redis-cli untuk memastikan nilai bertambah
![Gambar 20](gambar-20.png)

----
Exists
![Gambar 21](gambar-21.png)

---

menghapus kunci pada python
![Gambar 22](gambar-22.png)

![Gambar 23](gambar-23.png)

---

dengan Expire tandai key second_num kadaluwarsa setelah 10 detik
![Gambar 24](gambar-24.png)

---

setara dengan menggunakan python
![Gambar 25](gambar-25.png)

---

mengecek dan verifikasi list telah dibuat redis 
![Gambar 26](gambar-26.png)

---

menamahkan beberapa nilai ke list
![Gambar 27](gambar-27.png)

---

memeriksa daftar baru dr redis-cli
![Gambar 28](gambar-28.png)

----


![Gambar 29](gambar-29.png)

---

memeriksa daftar baru dari python
![Gambar 30](gambar-30.png)

----

menyimpan kamus sebagai nilai. sama seperti redis docs
![Gambar 31](gambar-31.png)

---

redis-py
![Gambar 32](gambar-32.png)

---

memastikan telah diinput pada python dengan menguji meggunakan redis-cli
![Gambar 33](gambar-33.png)

---

menampilkan menggunakan redis-py
![Gambar 34](gambar-34.png)

---

Materi dan Penjelasan 4 Pada materi dan penjelasan dibagian 3 yaitu menulis program dengan python yang membutuhkan lima langkah dasar yaitu impor redis, tentukan informasi koneksi untuk redis, membuat objek koneksi redis, mengatur pesan ke redis, mengambil pesan redis dan menampilkan pesan tersebut. Pertama – tama pada shell unix python, disini user membuat dokumen baru dengan nama python3.py yang didalamnya akan berisi skrip untuk mengimplementasikan 5 langkah tersebut
![Gambar 35](gambar-35.png)

![Gambar 36](gambar-36.png)

---


