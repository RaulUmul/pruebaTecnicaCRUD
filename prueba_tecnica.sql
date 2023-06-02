CREATE
DATABASE prueba_tecnica;

CREATE TABLE proveedor
(
    id_proveedor INT IDENTITY (1,1) PRIMARY KEY NOT NULL,
    descripcion  VARCHAR(100)
);

CREATE TABLE presentacion
(
    id_presentacion INT IDENTITY (1,1) PRIMARY KEY NOT NULL,
    descripcion     VARCHAR(100)
);

CREATE TABLE marca
(
    id_marca    INT IDENTITY (1,1) PRIMARY KEY NOT NULL,
    descripcion VARCHAR(100)
);

CREATE TABLE zona
(
    id_zona INT IDENTITY(1,1) PRIMARY KEY NOT NULL,
    descripcion VARCHAR(50)
);

CREATE TABLE producto
(
    id_producto          INT IDENTITY (1,1) PRIMARY KEY PRIMARY KEY NOT NULL,
    id_marca             INT,
    id_presentacion      INT,
    id_proveedor         INT,
    id_zona              INT,
    codigo               INT,
    descripcion_producto VARCHAR(100),
    precio               FLOAT,
    stock                INT,
    iva                  INT,
    peso                 FLOAT,
--   Llaves foraneas.
    FOREIGN KEY (id_presentacion) REFERENCES presentacion (id_presentacion),
    FOREIGN KEY (id_proveedor) REFERENCES proveedor (id_proveedor),
    FOREIGN KEY (id_marca) REFERENCES producto (id_marca),
    FOREIGN KEY (id_zona) REFERENCES zona (id_zona)
);
