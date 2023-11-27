INSERT INTO matpel (kd_matpel, nm_matpel)
VALUES 
('MP001', 'Matematika'),
('MP002', 'Bahasa Inggris'),
('MP003', 'Sejarah'),
('MP004', 'Fisika'),
('MP005', 'Seni Budaya');

INSERT INTO guru (nip, nm_guru, tmp_lahir_guru, tgl_lahir_guru, jkel_guru, alamat, telp, kd_matpel, nm_matpel)
VALUES 
('12345678901', 'Nama Guru 1', 'Tempat Lahir Guru 1', '1990-01-01', 'L', 'Alamat Guru 1', '1234567890', 'MP001', 'Matematika'),
('23456789012', 'Nama Guru 2', 'Tempat Lahir Guru 2', '1991-02-02', 'P', 'Alamat Guru 2', '2345678901', 'MP002', 'Bahasa Inggris'),
('34567890123', 'Nama Guru 3', 'Tempat Lahir Guru 3', '1992-03-03', 'L', 'Alamat Guru 3', '3456789012', 'MP003', 'Sejarah'),
('45678901234', 'Nama Guru 4', 'Tempat Lahir Guru 4', '1993-04-04', 'P', 'Alamat Guru 4', '4567890123', 'MP004', 'Fisika'),
('56789012345', 'Nama Guru 5', 'Tempat Lahir Guru 5', '1994-05-05', 'L', 'Alamat Guru 5', '5678901234', 'MP005', 'Seni Budaya');

INSERT INTO guru (nip, nm_guru, tmp_lahir_guru, tgl_lahir_guru, jkel_guru, alamat, telp, kd_matpel, nm_matpel)
VALUES 
('12345678901', 'John Doe', 'Jakarta', '1990-05-15', 'L', 'Jl. Raya 123', '12345678901234', '12345', 'Matematika'),
('23456789012', 'Jane Smith', 'Surabaya', '1985-08-20', 'P', 'Jl. Merdeka 456', '23456789012345', '23456', 'Bahasa Inggris'),
('34567890123', 'David Johnson', 'Bandung', '1987-12-10', 'L', 'Jl. Harmoni 789', '34567890123456', '34567', 'Sejarah'),
('45678901234', 'Sarah Lee', 'Yogyakarta', '1992-04-25', 'P', 'Jl. Maju Mundur 101', '45678901234567', '45678', 'Fisika'),
('56789012345', 'Emily Wilson', 'Semarang', '1983-11-30', 'P', 'Jl. Jendral Sudirman 202', '56789012345678', '56789', 'Seni Budaya');

INSERT INTO guru (nip, nm_guru, tmp_lahir_guru, tgl_lahir_guru, jkel_guru, alamat, telp, kd_matpel, nm_matpel)
VALUES 
('67890123456', 'Michael Davis', 'Medan', '1991-07-08', 'L', 'Jl. Pahlawan 303', '67890123456789', '12345', 'Matematika'),
('78901234567', 'Jessica Brown', 'Denpasar', '1984-09-12', 'P', 'Jl. Gajah Mada 505', '78901234567890', '23456', 'Bahasa Inggris'),
('89012345678', 'Christopher Martinez', 'Palembang', '1989-02-18', 'L', 'Jl. Veteran 707', '89012345678901', '34567', 'Sejarah'),
('90123456789', 'Amanda Garcia', 'Makassar', '1993-06-22', 'P', 'Jl. Sudirman 909', '90123456789012', '45678', 'Fisika'),
('01234567890', 'Kevin Rodriguez', 'Batam', '1982-10-05', 'L', 'Jl. Hayam Wuruk 111', '01234567890123', '56789', 'Seni Budaya');

INSERT INTO kelas (kd_kelas, nm_kelas, jml_siswa, thn_ajaran, nip, nm_guru)
VALUES 
('KLS00001', 'Kelas A', 25, '2023/2024', '12345678901', 'Nama Guru 1'),
('KLS00002', 'Kelas B', 30, '2023/2024', '23456789012', 'Nama Guru 2'),
('KLS00003', 'Kelas C', 28, '2023/2024', '34567890123', 'Nama Guru 3'),
('KLS00004', 'Kelas D', 22, '2023/2024', '45678901234', 'Nama Guru 4'),
('KLS00005', 'Kelas E', 27, '2023/2024', '56789012345', 'Nama Guru 5');

INSERT INTO siswa (nis, nm_siswa, tmp_lahir, tgl_lahir, jkel, alamat, telp, nm_wali, kd_kelas, username, password)
VALUES 
('12345678901', 'Nama Siswa 1', 'Tempat Lahir Siswa 1', '2005-01-01', 'L', 'Alamat Siswa 1', '1234567890', 'Wali 1', 'KLS00001', 'siswa1', 'password1'),
('23456789012', 'Nama Siswa 2', 'Tempat Lahir Siswa 2', '2005-02-02', 'P', 'Alamat Siswa 2', '2345678901', 'Wali 2', 'KLS00002', 'siswa2', 'password2'),
('34567890123', 'Nama Siswa 3', 'Tempat Lahir Siswa 3', '2005-03-03', 'L', 'Alamat Siswa 3', '3456789012', 'Wali 3', 'KLS00003', 'siswa3', 'password3'),
('45678901234', 'Nama Siswa 4', 'Tempat Lahir Siswa 4', '2005-04-04', 'P', 'Alamat Siswa 4', '4567890123', 'Wali 4', 'KLS00004', 'siswa4', 'password4'),
('56789012345', 'Nama Siswa 5', 'Tempat Lahir Siswa 5', '2005-05-05', 'L', 'Alamat Siswa 5', '5678901234', 'Wali 5', 'KLS00005', 'siswa5', 'password5');

INSERT INTO nilai (kd_nilai, nis, nm_siswa, kd_matpel, nm_matpel, uts_sem_ganjil, uas_sem_ganjil, uts_sem_genap, uas_sem_genap)
VALUES 
('NIL00001', '12345678901', 'Nama Siswa 1', 'MP001', 'Matematika', 85, 78, 81, 82);
INSERT INTO nilai (kd_nilai, nis, nm_siswa, kd_matpel, nm_matpel, uts_sem_ganjil, uas_sem_ganjil, uts_sem_genap, uas_sem_genap)
VALUES 
('NIL000000002', '23456789012', 'Nama Siswa 2', 'MP002', 'Bahasa Inggris', 75, 80, 82, 79),
('NIL000000003', '34567890123', 'Nama Siswa 3', 'MP003', 'Sejarah', 88, 92, 87, 90),
('NIL000000004', '45678901234', 'Nama Siswa 4', 'MP004', 'Fisika', 92, 85, 88, 90),
('NIL000000005', '56789012345', 'Nama Siswa 5', 'MP005', 'Seni Budaya', 78, 82, 85, 88),
('NIL000000006', '12345678901', 'Nama Siswa 1', 'MP001', 'Matematika', 95, 88, 92, 90),
('NIL000000007', '23456789012', 'Nama Siswa 2', 'MP002', 'Bahasa Inggris', 85, 78, 80, 85),
('NIL000000008', '34567890123', 'Nama Siswa 3', 'MP003', 'Sejarah', 78, 82, 86, 88),
('NIL000000009', '45678901234', 'Nama Siswa 4', 'MP004', 'Fisika', 90, 92, 88, 85),
('NIL000000010', '56789012345', 'Nama Siswa 5', 'MP005', 'Seni Budaya', 82, 80, 78, 83);
