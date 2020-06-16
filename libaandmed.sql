INSERT INTO TALU (nimi, aadress, email) VALUES
    ('Kasemetsa talu', 'Kasemetsa 5', 'kasemetsa@gmail.com'),
    ('Metsataguse talu', 'Kuuse 25', 'metsataguse@gmail.com'),
    ('Marju talu', 'Tartu mnt 255', 'marju.maasikas@gmail.com');

INSERT INTO TOODE (kategooria, nimi, hind, yhik_kg_mitte_tk, pilt) VALUES
    ('Küpsetised', 'Rukkileib seemnetega', 2.50, FALSE, 'https://via.placeholder.com/600x400.jpg'),
    ('Piimatooted ja munad', 'Täispiim (1 liiter)', 1.05, FALSE, 'https://via.placeholder.com/600x400.jpg'),
    ('Piimatooted ja munad', 'Vabakasvatuse kanamuna', 0.15, FALSE, 'https://via.placeholder.com/600x400.jpg'),
    ('Puuviljad', 'Õun Valge Klaar', 2.50, TRUE, 'https://via.placeholder.com/600x400.jpg'),
    ('Hoidised', 'Maasikamoos 400g', 2.50, FALSE, 'https://via.placeholder.com/600x400.jpg'),
    ('Seemned ja teraviljad', 'Rukkitäisterajahu, mahe', 2.90, TRUE, 'https://via.placeholder.com/600x400.jpg'),
    ('Seemned ja teraviljad', 'Linaseemned', 4.50, TRUE, 'https://via.placeholder.com/600x400.jpg');

INSERT INTO TALU_TOODE(kogus, TALU_talu_id, TOODE_toote_id) VALUES
    (10, (SELECT talu_id FROM TALU WHERE nimi='Metsataguse talu'),(SELECT toote_id FROM TOODE WHERE nimi='Rukkileib seemnetega')),
    (18, (SELECT talu_id FROM TALU WHERE nimi='Kasemetsa talu'),(SELECT toote_id FROM TOODE WHERE nimi='Rukkileib seemnetega')),
    (44, (SELECT talu_id FROM TALU WHERE nimi='Metsataguse talu'),(SELECT toote_id FROM TOODE WHERE nimi='Täispiim (1 liiter)')),
    (130, (SELECT talu_id FROM TALU WHERE nimi='Metsataguse talu'),(SELECT toote_id FROM TOODE WHERE nimi='Vabakasvatuse kanamuna')),
    (90, (SELECT talu_id FROM TALU WHERE nimi='Marju talu'),(SELECT toote_id FROM TOODE WHERE nimi='Õun Valge Klaar')),
    (120, (SELECT talu_id FROM TALU WHERE nimi='Kasemetsa talu'),(SELECT toote_id FROM TOODE  WHERE nimi='Õun Valge Klaar')),
    (34, (SELECT talu_id FROM TALU WHERE nimi='Marju talu'),(SELECT toote_id FROM TOODE  WHERE nimi='Maasikamoos 400g')),
    (45, (SELECT talu_id FROM TALU WHERE nimi='Kasemetsa talu'),(SELECT toote_id FROM TOODE WHERE nimi='Rukkitäisterajahu, mahe')),
    (3, (SELECT talu_id FROM TALU WHERE nimi='Marju talu'),(SELECT toote_id FROM TOODE  WHERE nimi='Linaseemned'));
