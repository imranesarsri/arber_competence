CREATE TABLE
    `city` (
        `idCity` int(11) NOT NULL auto_increment PRIMARY KEY,
        `city_name` varchar(50) NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

INSERT INTO
    `city` (`idCity`, `city_name`)
VALUES (1, 'Casablanca'), (2, 'Marrakech'), (3, 'Rabat'), (4, 'Fes'), (5, 'Tangier'), (6, 'Agadir'), (7, 'Meknes'), (8, 'Oujda'), (9, 'Kenitra'), (10, 'Tetouan'), (11, 'Nador'), (12, 'Safi'), (13, 'Mohammedia'), (14, 'El Jadida'), (15, 'Beni Mellal'), (16, 'Taroudant'), (17, 'Khouribga'), (18, 'Larache'), (19, 'Taza'), (20, 'Settat');

CREATE TABLE
    `stagiaires` (
        `id` int(11) NOT NULL auto_increment PRIMARY KEY,
        `full_name` varchar(50) NOT NULL,
        `email` varchar(255) NOT NULL,
        `phone_number` varchar(15) NOT NULL,
        `address` varchar(255) NOT NULL,
        `idCity` int(11) DEFAULT NULL,
        CONSTRAINT fk_city FOREIGN KEY (idCity) REFERENCES city (idCity)
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

INSERT INTO
    `stagiaires` (
        `id`,
        `full_name`,
        `email`,
        `phone_number`,
        `address`,
        `idCity`
    )
VALUES (
        3,
        'imrane sarsri',
        'sarsri.imrane@gmail.com',
        '0626156115',
        'hay bir jdid gznaya',
        6
    ), (
        14,
        'Mary Johnson',
        'mary.johnson@email.com',
        '9876543210',
        '456 Elm Avenue',
        5
    ), (
        17,
        'Zachary Sharp',
        'xihec@mailinator.com',
        '101',
        'Sed et sed adipisci ',
        17
    ), (
        18,
        'Desiree Bryan',
        'cowozemo@mailinator.com',
        '404',
        'Voluptatem animi vo',
        10
    );