DROP TABLE IF EXISTS nilai;
DROP TABLE IF EXISTS absen;
DROP TABLE IF EXISTS siswa;
DROP TABLE IF EXISTS kelas;
DROP TABLE IF EXISTS guru;
DROP TABLE IF EXISTS matpel;
DROP TABLE IF EXISTS admin;

CREATE TABLE admin (
    username VARCHAR(25),
    password VARCHAR(250),
    nama VARCHAR(50),
    PRIMARY KEY (username),
);

CREATE TABLE matpel (
    kd_matpel CHAR(5),
    nm_matpel VARCHAR(35),
    PRIMARY KEY (kd_matpel)
);

CREATE TABLE guru (
    nip CHAR(11),
    nm_guru VARCHAR(30),
    tmp_lahir_guru VARCHAR(30),
    tgl_lahir_guru DATE,
    jkel_guru CHAR(1),
    alamat VARCHAR(100),
    telp CHAR(14),
    kd_matpel CHAR(5),
    nm_matpel VARCHAR(35),
    PRIMARY KEY (nip),
    FOREIGN KEY (kd_matpel) REFERENCES matpel (kd_matpel)
);

CREATE TABLE kelas (
    kd_kelas CHAR(8),
    nm_kelas VARCHAR(15),
    jml_siswa INT(100),
    thn_ajaran VARCHAR(9),
    nip CHAR(11),
    nm_guru VARCHAR(30),
    PRIMARY KEY (kd_kelas),
    FOREIGN KEY (nip) REFERENCES guru (nip)
);

CREATE TABLE siswa (
    nis CHAR(11),
    nm_siswa VARCHAR(30),
    tmp_lahir VARCHAR(30),
    tgl_lahir DATE,
    jkel CHAR(1),
    alamat VARCHAR(100),
    telp CHAR(14),
    nm_wali VARCHAR(30),
    kd_kelas CHAR(8),
    username VARCHAR(25),
    password VARCHAR(250),
    PRIMARY KEY (nis),
    FOREIGN KEY (kd_kelas) REFERENCES kelas (kd_kelas)
);

CREATE TABLE absen (
    kd_absen CHAR(5),
    nm_bulan VARCHAR(15),
    nis CHAR(11),
    nm_siswa VARCHAR(30),
    jml_hadir INT,
    alfa INT,
    izin INT,
    sakit INT,
    PRIMARY KEY (kd_absen),
    FOREIGN KEY (nis) REFERENCES siswa (nis)

);

CREATE TABLE nilai (
    kd_nilai CHAR(12),
    nis CHAR(11),
    nm_siswa VARCHAR(30),
    kd_matpel CHAR(5),
    nm_matpel VARCHAR(35),
    uts_sem_ganjil INT,
    uas_sem_ganjil INT,
    uts_sem_genap INT,
    uas_sem_genap INT,
    PRIMARY KEY (kd_nilai),
    FOREIGN KEY (nis) REFERENCES siswa (nis),
    FOREIGN KEY (kd_matpel) REFERENCES matpel (kd_matpel)
);