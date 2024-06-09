USE bengkel;

CREATE TABLE tipe_kendaraan(
id_tipe CHAR(4),
nama_tipe VARCHAR (20),
CONSTRAINT tipeKen_id_tipe_pk PRIMARY KEY (id_tipe)
);

CREATE TABLE pemilik(
id_pemilik VARCHAR (6),
nama_pemilik VARCHAR(30),
alamat_pemilik VARCHAR (30),
telp_pemilik VARCHAR (12),
CONSTRAINT pemilik_id_pemilik_pk PRIMARY KEY (id_pemilik)
);

CREATE TABLE jabatan (
id_jabatan CHAR(1),
nama_jabatan VARCHAR(10),
gaji_pokok INTEGER,
tunjangan INTEGER,
CONSTRAINT jabatan_id_jabatan_pk PRIMARY KEY (id_jabatan)
);

CREATE TABLE perintah_kerja(
id_perintah_kerja VARCHAR(4),
nama_perintah_kerja VARCHAR (30),
harga_layanan INTEGER,
CONSTRAINT perintah_kerja_id_perintah_kerja_pk PRIMARY KEY (id_perintah_kerja)
);


CREATE TABLE nota_jasa(
id_nota_jasa VARCHAR(5),
tgl_nota_jasa DATE,
CONSTRAINT nota_jasa_id_nota_jasa_pk PRIMARY KEY (id_nota_jasa)
);

CREATE TABLE nota_suku_cadang(
no_nota_suku_cadang VARCHAR (7),
tgl_nota_suku_cadang DATE,
CONSTRAINT nota_suku_cadang_no_nota_suku_cadang_pk PRIMARY KEY (no_nota_suku_cadang)
);

CREATE TABLE suku_cadang(
id_suku_cadang VARCHAR(20),
nama_suku_cadang VARCHAR(30),
harga_satuan INTEGER,
CONSTRAINT suku_cadang_id_suku_cadang_pk PRIMARY KEY (id_suku_cadang)
);

CREATE TABLE jasa_bengkel(
id_jasa VARCHAR(4),
nama_jasa VARCHAR(30),
biaya_jasa INTEGER,
CONSTRAINT jasa_bengkel_id_jasa_pk PRIMARY KEY (id_jasa)
);

CREATE TABLE kendaraan(
no_stnk VARCHAR (10),
id_tipe CHAR (4),
id_pemilik VARCHAR (6),
no_mesin VARCHAR (14),
no_rangka VARCHAR (18),
tahun INTEGER,
warna VARCHAR (10),
CONSTRAINT kendaraan_no_stnk_pk PRIMARY KEY (no_stnk),
CONSTRAINT kendaraan_id_tipe_fk FOREIGN KEY (id_tipe)
REFERENCES tipe_kendaraan (id_tipe),
CONSTRAINT kendaraan_id_pemilik_fk FOREIGN KEY (id_pemilik)
REFERENCES pemilik (id_pemilik)
);

CREATE TABLE pegawai(
id_pegawai VARCHAR(6),
id_jabatan CHAR (1),
nama_pegawai VARCHAR(30),
alamat_pegawai VARCHAR (30),
tlp_pegawai VARCHAR (12),
CONSTRAINT pegawai_id_pegawai_pk PRIMARY KEY (id_pegawai),
CONSTRAINT pegawai_id_jabatan_fk FOREIGN KEY (id_jabatan)
REFERENCES jabatan (id_jabatan)
);

CREATE TABLE pkb(
id_pkb VARCHAR(5),
no_stnk VARCHAR(5),
no_nota_suku_cadang VARCHAR (7),
id_nota_jasa VARCHAR (5),
id_pegawai VARCHAR (6),
tgl_terima DATE,
jam_terima TIME,
km_terakhir INTEGER,
waktu_pengerjaan INTEGER,
CONSTRAINT pkb_id_pkb_pk PRIMARY KEY (id_pkb),
CONSTRAINT pkb_no_stnk_fk FOREIGN KEY (no_stnk)
REFERENCES kendaraan (no_stnk),
CONSTRAINT pkb_no_nota_suku_cadang_fk FOREIGN KEY (no_nota_suku_cadang)
REFERENCES nota_suku_cadang (no_nota_suku_cadang),
CONSTRAINT pkb_id_nota_jasa_fk FOREIGN KEY (id_nota_jasa)
REFERENCES nota_jasa (id_nota_jasa),
CONSTRAINT pkb_id_pegawai_fk FOREIGN KEY (id_pegawai)
REFERENCES pegawai (id_pegawai)
);

CREATE TABLE meminta (
id_pkb VARCHAR (5),
id_perintah_kerja VARCHAR (4),
CONSTRAINT meminta_id_pkb_perintah_kerja_pk PRIMARY KEY (id_pkb, id_perintah_kerja),
CONSTRAINT meminta_id_pkb_fk FOREIGN KEY (id_pkb) 
REFERENCES pkb (id_pkb),
CONSTRAINT meminta_id_perintah_kerja_fk FOREIGN KEY (id_perintah_kerja) 
REFERENCES perintah_kerja (id_perintah_kerja)
);

CREATE TABLE detail_nota_suku_cadang(
no_nota_suku_cadang VARCHAR (7),
id_suku_cadang VARCHAR(20),
banyak INTEGER,
CONSTRAINT detail_nota_suku_cadang_no_nota_suku_cadang_id_suku_cadang_pk PRIMARY KEY 
(no_nota_suku_cadang, id_suku_cadang),
CONSTRAINT detail_nota_suku_cadang_no_nota_suku_cadang_fk FOREIGN KEY (no_nota_suku_cadang)
REFERENCES nota_suku_cadang (no_nota_suku_cadang),
CONSTRAINT detail_nota_suku_cadang_id_suku_cadang_fk FOREIGN KEY (id_suku_cadang)
REFERENCES suku_cadang(id_suku_cadang)
);

CREATE TABLE detail_nota_jasa_bengkel(
id_nota_jasa VARCHAR(5),
id_jasa VARCHAR(4),
CONSTRAINT detail_nota_jasa_bengkel_id_nota_jasa_id_jasa_pk PRIMARY KEY(id_nota_jasa, id_jasa),
CONSTRAINT detail_nota_jasa_bengkel_id_nota_jasa_fk FOREIGN KEY (id_nota_jasa)
REFERENCES nota_jasa (id_nota_jasa),
CONSTRAINT detail_nota_jasa_bengkel_id_jasa_fk FOREIGN KEY (id_jasa)
REFERENCES jasa_bengkel (id_jasa)
);

INSERT INTO tipe_kendaraan VALUES 
('0001','sedan'),
('0002','off road'),
('0003','pick up'),
('0004','mini bus'),
('0005','suv'),
('0006', 'MPV'),
('0007', 'Truck'),
('0008', 'Limosin'),
('0009', 'Crossover'),
('0010', 'Jeep');
SELECT * FROM tipe_kendaraan;


INSERT INTO pemilik VALUES 
('00001','ahmad','jl kelapa gading','081234567890'),
('00002','sayuti','jl maju makmur','083456217893'),
('00003','gerald','jl jagir','085462718463'),
('00004','sambo','jl dadu','087564738291'),
('00005','ipin','jl seru','088675645342'),
('00006','ferdi','jl kesana','087564899534'),
('00007','yuma','jl maju makmur','087766554433'),
('00008','Dzaki','jl udang bakar','087882957110'),
('00009','hana','jl nasi kuning','089667546897'),
('00010','upin','jl lembah hitam','087665457887');

INSERT INTO jabatan VALUES 
('1', 'KepalaBgkl', 1500000, 500000), 
('2', 'Mekanik', 750000, 200000),
('3', 'Service', 600000, 100000),
('4', 'PencuciMtr', 500000, 75000),
('5', 'OfficeBoy', 300000, 25000),
('0', 'gudang', 2000000, 250000),
('6', 'toolman', 500000, 100000),
('7', 'frontliner', 500000, 100000),
('8', 'custserv', 550000, 100000),
('9', 'sparepart', 500000, 100000);

SELECT*FROM jabatan;

INSERT INTO perintah_kerja VALUES 
('001', 'Heavy Repair',900000), 
('002', 'Tune Up', 800000),
('003', 'Periodic Service', 500000),
('004', 'Brake Service', 100000),
('005', 'Car Seat Service', 350000),
('006', 'Pengecekan Baut', 300000),
('007', 'Service Sistem Kemudi', 400000),
('008', 'Pemeriksaan Air Radiator', 300000),
('009', 'Cek Aki', 100000),
('010', 'Pembersihan Filter Udara', 200000);
SELECT * FROM perintah_kerja;

INSERT INTO nota_jasa VALUES 
('12345','2021-12-12'),
('16543','2021-03-21'),
('08554','2021-08-23'),
('64725','2021-04-11'),
('73542','2021-06-17'),
('17675','2022-04-07'),
('11963','2022-07-25'),
('19735','2022-06-04'),
('15493','2022-10-15'),
('15975','2022-11-19');

SELECT*FROM nota_jasa;

INSERT INTO nota_suku_cadang VALUES
('1234567','2021-12-12'),
('6372534','2021-03-21'),
('9247563','2021-08-23'),
('9756345','2021-04-11'),
('3452780','2021-06-17'),
('1234835','2022-01-17'),
('6372875','2022-09-21'),
('9247098','2022-09-23'),
('9756142','2022-04-11'),
('3452666','2022-11-18');
SELECT*FROM nota_suku_cadang;


INSERT INTO suku_cadang VALUES 
('12638990', 'Aki', 2000000),
('11157121', 'Busi', 400000),
('11157122', 'Kampas Rem', 300000),
('11157123', 'Fan Belt', 500000),
('11157124', 'Filter Udara', 220000),
('11157125', 'Oli Mesin', 150000),
('11157126', 'Freon', 200000),
('11157127', 'Ban Mobil', 1000000),
('11157128', 'Filter Bensin', 200000),
('11157129', 'Filter Oli', 100000);
SELECT * FROM suku_cadang;


INSERT INTO jasa_bengkel VALUES 
('0111', 'Service Berkala', 500000),
('0112', 'Service Tune Up', 1000000),
('0113', 'Fast Track', 1250000),
('0114', 'Service by Booking', 525000),
('0115', 'Light Service', 350000),
('0116', 'Heavy Repair', 800000),
('0117', 'Claim Service', 200000),
('0118', 'Cuci Salon', 150000),
('0119', 'Upgrade', 400000),
('0120', 'Cuci Biasa', 100000);
SELECT * FROM jasa_bengkel;

INSERT INTO kendaraan VALUES
('11112','0003','00001','345678','54637463',2004,'biru'),
('11113','0001','00002','345656','54634245',2017,'merah'),
('11114','0005','00003','345678','54636892',2013,'biru'),
('11115','0007','00004','345613','54637645',2020,'kuning'),
('11116','0002','00005','348462','54636645',2021,'hijau'),
('11117','0008','00006','319364','54699010',2013,'kuning'),
('11118','0006','00007','344273','54658561',2017,'hitam'),
('11119','0006','00008','341085','54756477',2019,'putih'),
('11120','0009','00009','346556','54134890',2014,'abu-abu'),
('11121','0007','00010','347645','54177480',2022,'coklat');
SELECT*FROM kendaraan
DELETE FROM kendaraan

INSERT INTO pegawai VALUES 
('126111','0','Budi','Jl.Pagesangan Indah','081567645267'),
('126112','1','Yanto','Jl.Gedangan Asri','081567345772'),
('126113','2','Roy','Jl.Jumputrejo Indah','081567739267'),
('126114','3','Kiyosi','Jl.Tujuh Lautan','08156734876'),
('126115','4','Rudi','Jl.Kesatria Muda','0815673477522'),
('126116','5','Salim','Jl.Jambangan','081567346570'),
('126117','6','Gading','Jl.Randaitan','081567342435'),
('126118','7','Martin','Jl.Segitiga Biru','081522555267'),
('126119','8','Rafli','Jl.Tiga Roda','081567348813'),
('126120','9','Raflan','Jl.Kepala Gading','081566665267');
SELECT*FROM pegawai


INSERT INTO pkb VALUES
('51521','11112','1234567','12345','126111','2022-09-10','07:05:50',20000,2),
('51522','11113','6372534','16543','126112','2022-09-10','08:15:50',21000,4),
('51523','11114','9247563','08554','126113','2022-09-10','09:25:57',22000,3),
('51524','11115','9756345','64725','126114','2022-09-10','10:15:32',23000,2),
('51525','11116','3452780','73542','126115','2022-09-10','13:45:57',24000,1),
('51526','11117','1234835','17675','126116','2022-09-10','16:18:11',25000,3),
('51527','11118','6372875','11963','126117','2022-09-10','17:13:44',26000,4),
('51528','11119','9247098','19735','126118','2022-09-10','18:13:13',27000,5),
('51529','11120','9756142','15493','126119','2022-09-10','18:16:22',28000,5),
('51530','11121','3452666','15975','126120','2022-09-10','19:14:51',29000,1);
SELECT*FROM pkb

INSERT INTO meminta VALUES
('51521','001'),
('51522','002'),
('51523','003'),
('51524','004'),
('51525','005'),
('51526','006'),
('51527','007'),
('51528','008'),
('51529','009'),
('51530','010');
SELECT*FROM meminta

INSERT INTO detail_nota_suku_cadang VALUES
('1234567','12638990',1),
('6372534','11157121',2),
('9247563','11157122',3),
('9756345','11157123',4),
('3452780','11157124',7),
('1234835','11157125',6),
('6372875','11157126',7),
('9247098','11157127',9),
('9756142','11157128',5),
('3452666','11157129',4);
SELECT*FROM detail_nota_suku_cadang

INSERT INTO detail_nota_jasa_bengkel VALUES
('12345','0111'),
('16543','0112'),
('08554','0113'),
('64725','0114'),
('73542','0115'),
('17675','0116'),
('11963','0117'),
('19735','0118'),
('15493','0119'),
('15975','0120');
SELECT*FROM detail_nota_jasa_bengkel