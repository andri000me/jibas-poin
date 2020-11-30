# DATABASE

## siswa
id              int(11)
nipd            varchar(16)
nama            varchar(128)
nik             varchar(64)
nisn            varchar(64)
tempat_lahir    varchar(64)
tanggal_lahir   date
lp              varchar(1)
rombel_id       int(11)
ayah            varchar(64)
ibu             varchar(64)
alamat          varchar(255)
foto            mediumblob
no_hp_siswa     varchar(20)

## pegawai
id              int(10) unsigned auto_increment
npa             varchar(30)
nama            varchar(100)
tempat_lahir    varchar(50)
tanggal_lahir   date
lp              varchar(1)
no_hp           varchar(20)
foto            blob
alamat          varchar(255)

## rombel
id              int(11)
nama_rombel     varchar(50)
tahun_ajaran_id int(11)
users_id        int(11)
aktif           tinyint(1)

## tahun ajaran
id              int(10)
tahun_ajaran    varchar(50)
aktif           tinyint(1)

## poin
id              int(11)
nama_poin       varchar(255)
jenis_poin 	    tinyint(1)      = ['0' => 'pelanggaran', '1' => 'kebaikan']
nilai           int(11)


## siswa_poin
id              int(11)
siswa_id        int(11)
jenis_poin_id   int(11)
catatan         varchar(255)
user_id         int(11)
tgl             date

## siswa_prestasi
id              int(11)
siswa_id        int(11)
prestasi        varchar(255)
des_prestasi    varchar(255)
user_id         int(11)
tgl             date

## surat
surat_id        int(11)
tanggal_surat   date
siswa_id        int(11)
rombel          varchar(16)       