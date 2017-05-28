--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: final; Type: SCHEMA; Schema: -; Owner: lbaw1611
--

CREATE SCHEMA final;


ALTER SCHEMA final OWNER TO lbaw1611;

SET search_path = final, pg_catalog;

--
-- Name: orderstate; Type: TYPE; Schema: final; Owner: lbaw1611
--

CREATE TYPE orderstate AS ENUM (
    'canceled',
    'requested',
    'sent',
    'arrived'
);


ALTER TYPE orderstate OWNER TO lbaw1611;

--
-- Name: update_client(); Type: FUNCTION; Schema: final; Owner: lbaw1611
--

CREATE FUNCTION update_client() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
    DECLARE
    BEGIN
        IF (TG_OP = 'UPDATE') THEN
            IF(NEW.isRemoved = true) THEN
                DELETE FROM "review" WHERE idUser = NEW.id;
                DELETE FROM "favorite" WHERE idUser = NEW.id;
                DELETE FROM "to-go" WHERE idUser = NEW.id;
            END IF;
        END IF;
        RETURN NEW;
    END;
$$;


ALTER FUNCTION final.update_client() OWNER TO lbaw1611;

--
-- Name: update_order(); Type: FUNCTION; Schema: final; Owner: lbaw1611
--

CREATE FUNCTION update_order() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
    DECLARE
        row RECORD;
    BEGIN
        IF (TG_OP = 'UPDATE') THEN
            IF (NEW.state = 'sent') THEN
                NEW.sentDate = now();
            ELSEIF (NEW.state = 'canceled') THEN
                NEW.canceledDate = now();
                FOR row IN SELECT * FROM "order-product" WHERE idOrder = NEW.id
                    LOOP
                        EXECUTE 'UPDATE "product" SET stock = stock + ' || row.quantity || '
                                WHERE product.id = ' || row.idProduct;
                    END LOOP;
            END IF;
        END IF;
        RETURN NEW;
    END;
$$;


ALTER FUNCTION final.update_order() OWNER TO lbaw1611;

--
-- Name: update_orderproduct(); Type: FUNCTION; Schema: final; Owner: lbaw1611
--

CREATE FUNCTION update_orderproduct() RETURNS trigger
    LANGUAGE plpgsql
    AS $$    DECLARE
        delta_quantity integer;
        old_stock integer;
        id_user integer;
    BEGIN

        IF (TG_OP = 'UPDATE') THEN
            old_stock := (SELECT stock FROM "product" WHERE id = NEW.idProduct) ;
            IF (NEW.quantity != OLD.quantity) THEN
                delta_quantity = OLD.quantity - NEW.quantity;
                IF(0 > old_stock + delta_quantity)THEN
                    UPDATE "product" SET stock = 0
                    WHERE id = NEW.idProduct;
                ELSE
                    UPDATE "product" SET stock = old_stock + delta_quantity
                    WHERE product.id = NEW.idProduct;
                END IF;
            END IF;
            RETURN NEW;
        ELSEIF (TG_OP = 'INSERT') THEN
            old_stock := (SELECT stock FROM "product" WHERE id = NEW.idProduct) ;
            id_user := (SELECT idClient FROM "order" WHERE id = NEW.idOrder) ;
            IF(0 > old_stock - NEW.quantity) THEN
                UPDATE "product" SET stock = 0
                WHERE product.id = NEW.idProduct;
            ELSE
                UPDATE "product" SET stock = old_stock - NEW.quantity
                WHERE product.id = NEW.idProduct;
            END IF;
            DELETE FROM "to-go" WHERE (idProduct = NEW.idProduct AND idUser = id_user);
            RETURN NEW;
        ELSEIF (TG_OP = 'DELETE') THEN
            old_stock := (SELECT stock FROM "product" WHERE id = OLD.idProduct) ;
            UPDATE "product" SET stock = old_stock + OLD.quantity
            WHERE product.id = OLD.idProduct;
            IF ((SELECT count(*) FROM "order-product" WHERE idOrder = OLD.idOrder) <= 0) THEN
                DELETE FROM "order" WHERE id = OLD.idOrder;
            END IF;
            RETURN OLD;
        END IF;
    END;
$$;


ALTER FUNCTION final.update_orderproduct() OWNER TO lbaw1611;

--
-- Name: update_product_delete(); Type: FUNCTION; Schema: final; Owner: lbaw1611
--

CREATE FUNCTION update_product_delete() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
DECLARE
    BEGIN
        IF (TG_OP = 'UPDATE') THEN
          IF (NEW.availability = FALSE) THEN
            DELETE FROM "favorite" WHERE idProduct = NEW.id;
            DELETE FROM "to-go" WHERE idProduct = NEW.id;
          END IF;
        END IF;
        RETURN NEW;
    END;
$$;


ALTER FUNCTION final.update_product_delete() OWNER TO lbaw1611;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: address; Type: TABLE; Schema: final; Owner: lbaw1611; Tablespace: 
--

CREATE TABLE address (
    id integer NOT NULL,
    address text NOT NULL,
    idzipcode integer,
    country text
);


ALTER TABLE address OWNER TO lbaw1611;

--
-- Name: address_id_seq; Type: SEQUENCE; Schema: final; Owner: lbaw1611
--

CREATE SEQUENCE address_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE address_id_seq OWNER TO lbaw1611;

--
-- Name: address_id_seq; Type: SEQUENCE OWNED BY; Schema: final; Owner: lbaw1611
--

ALTER SEQUENCE address_id_seq OWNED BY address.id;


--
-- Name: auth_tokens; Type: TABLE; Schema: final; Owner: lbaw1611; Tablespace: 
--

CREATE TABLE auth_tokens (
    id integer NOT NULL,
    selector character varying(12),
    "hashedValidator" character varying(64),
    userid integer,
    expires timestamp without time zone
);


ALTER TABLE auth_tokens OWNER TO lbaw1611;

--
-- Name: auth_tokens_id_seq; Type: SEQUENCE; Schema: final; Owner: lbaw1611
--

CREATE SEQUENCE auth_tokens_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE auth_tokens_id_seq OWNER TO lbaw1611;

--
-- Name: auth_tokens_id_seq; Type: SEQUENCE OWNED BY; Schema: final; Owner: lbaw1611
--

ALTER SEQUENCE auth_tokens_id_seq OWNED BY auth_tokens.id;


--
-- Name: category; Type: TABLE; Schema: final; Owner: lbaw1611; Tablespace: 
--

CREATE TABLE category (
    id integer NOT NULL,
    name text NOT NULL
);


ALTER TABLE category OWNER TO lbaw1611;

--
-- Name: category_id_seq; Type: SEQUENCE; Schema: final; Owner: lbaw1611
--

CREATE SEQUENCE category_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE category_id_seq OWNER TO lbaw1611;

--
-- Name: category_id_seq; Type: SEQUENCE OWNED BY; Schema: final; Owner: lbaw1611
--

ALTER SEQUENCE category_id_seq OWNED BY category.id;


--
-- Name: client; Type: TABLE; Schema: final; Owner: lbaw1611; Tablespace: 
--

CREATE TABLE client (
    id integer NOT NULL,
    firstname text NOT NULL,
    lastname text NOT NULL,
    phonenumber text,
    taxpayernumber integer,
    isremoved boolean DEFAULT false NOT NULL
);


ALTER TABLE client OWNER TO lbaw1611;

--
-- Name: client-address; Type: TABLE; Schema: final; Owner: lbaw1611; Tablespace: 
--

CREATE TABLE "client-address" (
    iduser integer NOT NULL,
    idaddress integer NOT NULL
);


ALTER TABLE "client-address" OWNER TO lbaw1611;

--
-- Name: favorite; Type: TABLE; Schema: final; Owner: lbaw1611; Tablespace: 
--

CREATE TABLE favorite (
    iduser integer NOT NULL,
    idproduct integer NOT NULL
);


ALTER TABLE favorite OWNER TO lbaw1611;

--
-- Name: image; Type: TABLE; Schema: final; Owner: lbaw1611; Tablespace: 
--

CREATE TABLE image (
    id integer NOT NULL,
    name text NOT NULL,
    idproduct integer
);


ALTER TABLE image OWNER TO lbaw1611;

--
-- Name: image_id_seq; Type: SEQUENCE; Schema: final; Owner: lbaw1611
--

CREATE SEQUENCE image_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE image_id_seq OWNER TO lbaw1611;

--
-- Name: image_id_seq; Type: SEQUENCE OWNED BY; Schema: final; Owner: lbaw1611
--

ALTER SEQUENCE image_id_seq OWNED BY image.id;


--
-- Name: kind; Type: TABLE; Schema: final; Owner: lbaw1611; Tablespace: 
--

CREATE TABLE kind (
    idcategory integer NOT NULL,
    idproduct integer NOT NULL
);


ALTER TABLE kind OWNER TO lbaw1611;

--
-- Name: occasion-gallery; Type: TABLE; Schema: final; Owner: lbaw1611; Tablespace: 
--

CREATE TABLE "occasion-gallery" (
    idspecialoccasion integer NOT NULL,
    idimage integer NOT NULL
);


ALTER TABLE "occasion-gallery" OWNER TO lbaw1611;

--
-- Name: order; Type: TABLE; Schema: final; Owner: lbaw1611; Tablespace: 
--

CREATE TABLE "order" (
    id integer NOT NULL,
    idaddress integer NOT NULL,
    idclient integer NOT NULL,
    state orderstate DEFAULT 'requested'::orderstate NOT NULL,
    orderdate date DEFAULT ('now'::text)::date NOT NULL,
    canceleddate date,
    sentdate date,
    arriveddate date
);


ALTER TABLE "order" OWNER TO lbaw1611;

--
-- Name: order-product; Type: TABLE; Schema: final; Owner: lbaw1611; Tablespace: 
--

CREATE TABLE "order-product" (
    idorder integer NOT NULL,
    idproduct integer NOT NULL,
    quantity integer NOT NULL,
    CONSTRAINT order_product_checkquantity CHECK ((quantity >= 0))
);


ALTER TABLE "order-product" OWNER TO lbaw1611;

--
-- Name: order_id_seq; Type: SEQUENCE; Schema: final; Owner: lbaw1611
--

CREATE SEQUENCE order_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE order_id_seq OWNER TO lbaw1611;

--
-- Name: order_id_seq; Type: SEQUENCE OWNED BY; Schema: final; Owner: lbaw1611
--

ALTER SEQUENCE order_id_seq OWNED BY "order".id;


--
-- Name: product; Type: TABLE; Schema: final; Owner: lbaw1611; Tablespace: 
--

CREATE TABLE product (
    id integer NOT NULL,
    name text NOT NULL,
    price real NOT NULL,
    stock integer NOT NULL,
    details text,
    availability boolean DEFAULT true NOT NULL,
    idpromotion integer,
    idspecialoccasion integer,
    CONSTRAINT product_checkprice CHECK ((price >= (0)::double precision)),
    CONSTRAINT product_checkstock CHECK ((stock >= 0))
);


ALTER TABLE product OWNER TO lbaw1611;

--
-- Name: product_id_seq; Type: SEQUENCE; Schema: final; Owner: lbaw1611
--

CREATE SEQUENCE product_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE product_id_seq OWNER TO lbaw1611;

--
-- Name: product_id_seq; Type: SEQUENCE OWNED BY; Schema: final; Owner: lbaw1611
--

ALTER SEQUENCE product_id_seq OWNED BY product.id;


--
-- Name: promotion; Type: TABLE; Schema: final; Owner: lbaw1611; Tablespace: 
--

CREATE TABLE promotion (
    id integer NOT NULL,
    promotion integer NOT NULL,
    beginningdate date NOT NULL,
    enddate date NOT NULL,
    CONSTRAINT promotion_checkdates CHECK ((beginningdate <= enddate)),
    CONSTRAINT promotion_checkpromotion CHECK (((promotion >= 0) AND (promotion <= 100)))
);


ALTER TABLE promotion OWNER TO lbaw1611;

--
-- Name: promotion_id_seq; Type: SEQUENCE; Schema: final; Owner: lbaw1611
--

CREATE SEQUENCE promotion_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE promotion_id_seq OWNER TO lbaw1611;

--
-- Name: promotion_id_seq; Type: SEQUENCE OWNED BY; Schema: final; Owner: lbaw1611
--

ALTER SEQUENCE promotion_id_seq OWNED BY promotion.id;


--
-- Name: review; Type: TABLE; Schema: final; Owner: lbaw1611; Tablespace: 
--

CREATE TABLE review (
    id integer NOT NULL,
    rate integer,
    date date DEFAULT ('now'::text)::date,
    comment text,
    iduser integer,
    idproduct integer,
    CONSTRAINT review_rate_ck CHECK (((rate >= 1) AND (rate <= 5)))
);


ALTER TABLE review OWNER TO lbaw1611;

--
-- Name: review_id_seq; Type: SEQUENCE; Schema: final; Owner: lbaw1611
--

CREATE SEQUENCE review_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE review_id_seq OWNER TO lbaw1611;

--
-- Name: review_id_seq; Type: SEQUENCE OWNED BY; Schema: final; Owner: lbaw1611
--

ALTER SEQUENCE review_id_seq OWNED BY review.id;


--
-- Name: special-occasion; Type: TABLE; Schema: final; Owner: lbaw1611; Tablespace: 
--

CREATE TABLE "special-occasion" (
    id integer NOT NULL,
    name text NOT NULL,
    beginningdate date NOT NULL,
    enddate date NOT NULL,
    CONSTRAINT special_occasion_checkdates CHECK ((beginningdate <= enddate))
);


ALTER TABLE "special-occasion" OWNER TO lbaw1611;

--
-- Name: special-occasion_id_seq; Type: SEQUENCE; Schema: final; Owner: lbaw1611
--

CREATE SEQUENCE "special-occasion_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "special-occasion_id_seq" OWNER TO lbaw1611;

--
-- Name: special-occasion_id_seq; Type: SEQUENCE OWNED BY; Schema: final; Owner: lbaw1611
--

ALTER SEQUENCE "special-occasion_id_seq" OWNED BY "special-occasion".id;


--
-- Name: to-go; Type: TABLE; Schema: final; Owner: lbaw1611; Tablespace: 
--

CREATE TABLE "to-go" (
    iduser integer NOT NULL,
    idproduct integer NOT NULL,
    quantity integer NOT NULL,
    CONSTRAINT togo_quantity_ck CHECK ((quantity > 0))
);


ALTER TABLE "to-go" OWNER TO lbaw1611;

--
-- Name: user; Type: TABLE; Schema: final; Owner: lbaw1611; Tablespace: 
--

CREATE TABLE "user" (
    id integer NOT NULL,
    username text NOT NULL,
    email text NOT NULL,
    password text NOT NULL,
    isadmin boolean DEFAULT false NOT NULL
);


ALTER TABLE "user" OWNER TO lbaw1611;

--
-- Name: user_id_seq; Type: SEQUENCE; Schema: final; Owner: lbaw1611
--

CREATE SEQUENCE user_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE user_id_seq OWNER TO lbaw1611;

--
-- Name: user_id_seq; Type: SEQUENCE OWNED BY; Schema: final; Owner: lbaw1611
--

ALTER SEQUENCE user_id_seq OWNED BY "user".id;


--
-- Name: zip-code; Type: TABLE; Schema: final; Owner: lbaw1611; Tablespace: 
--

CREATE TABLE "zip-code" (
    id integer NOT NULL,
    zipnumber text NOT NULL,
    city text NOT NULL
);


ALTER TABLE "zip-code" OWNER TO lbaw1611;

--
-- Name: zip-code_id_seq; Type: SEQUENCE; Schema: final; Owner: lbaw1611
--

CREATE SEQUENCE "zip-code_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "zip-code_id_seq" OWNER TO lbaw1611;

--
-- Name: zip-code_id_seq; Type: SEQUENCE OWNED BY; Schema: final; Owner: lbaw1611
--

ALTER SEQUENCE "zip-code_id_seq" OWNED BY "zip-code".id;


--
-- Name: id; Type: DEFAULT; Schema: final; Owner: lbaw1611
--

ALTER TABLE ONLY address ALTER COLUMN id SET DEFAULT nextval('address_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: final; Owner: lbaw1611
--

ALTER TABLE ONLY auth_tokens ALTER COLUMN id SET DEFAULT nextval('auth_tokens_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: final; Owner: lbaw1611
--

ALTER TABLE ONLY category ALTER COLUMN id SET DEFAULT nextval('category_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: final; Owner: lbaw1611
--

ALTER TABLE ONLY image ALTER COLUMN id SET DEFAULT nextval('image_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: final; Owner: lbaw1611
--

ALTER TABLE ONLY "order" ALTER COLUMN id SET DEFAULT nextval('order_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: final; Owner: lbaw1611
--

ALTER TABLE ONLY product ALTER COLUMN id SET DEFAULT nextval('product_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: final; Owner: lbaw1611
--

ALTER TABLE ONLY promotion ALTER COLUMN id SET DEFAULT nextval('promotion_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: final; Owner: lbaw1611
--

ALTER TABLE ONLY review ALTER COLUMN id SET DEFAULT nextval('review_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: final; Owner: lbaw1611
--

ALTER TABLE ONLY "special-occasion" ALTER COLUMN id SET DEFAULT nextval('"special-occasion_id_seq"'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: final; Owner: lbaw1611
--

ALTER TABLE ONLY "user" ALTER COLUMN id SET DEFAULT nextval('user_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: final; Owner: lbaw1611
--

ALTER TABLE ONLY "zip-code" ALTER COLUMN id SET DEFAULT nextval('"zip-code_id_seq"'::regclass);


--
-- Data for Name: address; Type: TABLE DATA; Schema: final; Owner: lbaw1611
--

INSERT INTO address VALUES (1, '94183 Johnson Avenue', 2, 'USA');
INSERT INTO address VALUES (2, '82228 Mifflin Alley', 4, 'USA');
INSERT INTO address VALUES (3, '0 Moose Parkway', 1, 'USA');
INSERT INTO address VALUES (4, '98477 Annamark Park', 3, 'USA');
INSERT INTO address VALUES (5, '2660 Arapahoe Hill', 2, 'USA');
INSERT INTO address VALUES (6, '708 Norway Maple Drive', 4, 'USA');
INSERT INTO address VALUES (7, '44633 Kennedy Drive', 3, 'USA');
INSERT INTO address VALUES (8, '6506 Milwaukee Road', 1, 'USA');
INSERT INTO address VALUES (59, 'Beautiful Avenue', 36, NULL);
INSERT INTO address VALUES (20, '94183 Johnson Avenue', 1, 'Portugal');
INSERT INTO address VALUES (29, 'Beautiful Avenue', 13, 'Portugal');
INSERT INTO address VALUES (42, 'Rua dos Clérigos', 22, 'Portugal');
INSERT INTO address VALUES (52, 'Beautiful Avenue', 19, 'Portugal');
INSERT INTO address VALUES (53, 'Rua dos Clerigos', 32, 'Portugal');
INSERT INTO address VALUES (54, 'Rua Fernando Pessoa', 33, 'Portugal');
INSERT INTO address VALUES (55, 'ffgdsf', 34, 'Portugal');
INSERT INTO address VALUES (56, 'Rua dos Clérigos', 19, 'Portugal');
INSERT INTO address VALUES (57, 'Rua dos Clérigos', 20, 'Portugal');
INSERT INTO address VALUES (58, 'yetd', 35, 'Portugal');


--
-- Name: address_id_seq; Type: SEQUENCE SET; Schema: final; Owner: lbaw1611
--

SELECT pg_catalog.setval('address_id_seq', 60, true);


--
-- Data for Name: auth_tokens; Type: TABLE DATA; Schema: final; Owner: lbaw1611
--

INSERT INTO auth_tokens VALUES (1, 'R2E77pCvMpIk', '3b1fc7374b919c1eb7e271905c7523106695c6ced2a3ad7d08fe20810a93d59c', 2, '2017-06-03 14:57:12');
INSERT INTO auth_tokens VALUES (2, 'xQMZzhMDlIoB', '9b13cc79dd15ba52f7ece838b9393aa828eb053b62dc845bb29c18bf301919aa', 2, '2017-06-03 17:37:24');
INSERT INTO auth_tokens VALUES (3, 's0NEa6fwVsT2', 'f6ec9d05827555476ab72bdd7d7218aa7c82137dad00d41544235c6503a95b7f', 2, '2017-06-03 18:12:48');
INSERT INTO auth_tokens VALUES (4, 'GWAWJdKuR6FK', '8610d56a1a80fba38dafbfbd4e82ce17ae1643d4f29398189197306f73600cb6', 1, '2017-06-03 18:21:09');
INSERT INTO auth_tokens VALUES (5, 'bOBhfeJrMsG9', 'd73377dacc8cb0ab99caa1b709cf68afdce2687bf4881d220f45a9d854edd5b9', 9, '2017-06-03 18:33:19');
INSERT INTO auth_tokens VALUES (6, 'ntDp1d4PX072', '6db68d1298b48c876bb7920ac3a072211197d923ad3b755ae8961bcfc9fae4ee', 2, '2017-06-03 18:55:54');
INSERT INTO auth_tokens VALUES (7, '04Djz0tGjF3K', '2772f03e87dda4fb239f04baecfceff917a250a194406319bf2a68b4f46ad7b4', 1, '2017-06-03 22:36:41');
INSERT INTO auth_tokens VALUES (8, 'tEPoGrz7nZL1', '7008db4a4059a59eed52cdbfe232c68f1550cd45936663375abc989a0d2e0bf4', 2, '2017-06-03 22:57:36');
INSERT INTO auth_tokens VALUES (9, 'dDgqjIX92BTN', '9ce678bca9945b9ba652bb166f880fc0e294193af4e3f24d14dadc6b8b828d62', 3, '2017-06-03 23:14:30');
INSERT INTO auth_tokens VALUES (10, '3bFaogjZxQP7', '24982cdbd733ceb5e04b3948915918b18e288fdab2486310ed8e1d68d2171429', 2, '2017-06-03 23:22:21');
INSERT INTO auth_tokens VALUES (11, '1Xp34afL9Lb5', 'c8d9caf29ea38f3ab80a516385e3db4fa69be8b7ace38f6b56cd904b307e494f', 3, '2017-06-03 23:27:44');
INSERT INTO auth_tokens VALUES (12, 'aPVMId4BCoJh', '23590c6cfe4f4b36c9db22c09cda9d9793efd7eb12e5d02765e52f82a42598c4', 2, '2017-06-04 00:46:51');
INSERT INTO auth_tokens VALUES (20, 'CSUV6Fe36FcF', 'ae432066a8db90051f65d64167f79d15eee89adcc5ecec505e88c415b0ec6fa1', 2, '2017-06-04 00:56:05');
INSERT INTO auth_tokens VALUES (21, 'FGJXeS2zUWB8', '7bd233d5c11a92e43a26c7160cb4c9f18718f19160a7899d7464a531fd7de1c1', 1, '2017-06-04 01:34:54');
INSERT INTO auth_tokens VALUES (35, 'bTK8GiNZdI3V', '46aa629eba5e520323d01aa00df917c32c7064fe4c944a60ec2ecfd238fd002c', 2, '2017-06-04 13:55:02');
INSERT INTO auth_tokens VALUES (50, 'DYEH3qYIUzrP', 'fd2d77beb8dff1e2e0d8bba198b719abea628308ef6d15e506afa8cd30d1ff26', 2, '2017-06-04 14:42:39');
INSERT INTO auth_tokens VALUES (51, 'fvfVUFrlRXIK', '7b00530971ecee0212dba8a66d5e4c098b7733d03d6e50c45144d9dd6a477471', 9, '2017-06-04 16:42:42');
INSERT INTO auth_tokens VALUES (52, '6CgBoQORv79y', '135b94a6f1100e791dd14cf6b901ee7ebc046e35d4658e520948789b45e93adf', 2, '2017-06-04 18:02:05');
INSERT INTO auth_tokens VALUES (53, 'wS8qutC1X3yB', '819642b29b6295d5e47e5cc492c1b1173e3ba2190b0c6985adcdb6b3ca6fa2d6', 2, '2017-06-04 18:30:30');
INSERT INTO auth_tokens VALUES (54, 'h5kJBEfOpGLi', '5821d3a0b756714588248efc668d869f551b165ec307d4553e8ad9d3c4cfd8f4', 1, '2017-06-04 18:46:33');
INSERT INTO auth_tokens VALUES (55, 'ZtEo630TimgP', '8c01f4eb52556a70efb5bb94f40e5ec8563bceeed154488e82105863e2458285', 9, '2017-06-04 20:03:04');
INSERT INTO auth_tokens VALUES (56, '2BlWUqf0ohpG', 'e65711a8fe95d06631816f186715c89ef7e2624b8c7966825df85cb6817077cd', 2, '2017-06-04 20:03:36');
INSERT INTO auth_tokens VALUES (57, 'SJtUUWgoIHzX', '7e8c40fa1ef7789e4e7309236223b971cec8251a73b148b1095a47c6ede7c73c', 1, '2017-06-04 20:06:26');
INSERT INTO auth_tokens VALUES (58, 'kQZ4Cf4zSp1O', 'd7d48369a8d83f06ab25e3a5fbdaf1a6653758107d8bcc0b7c2066e21e010cc7', 9, '2017-06-04 20:11:46');
INSERT INTO auth_tokens VALUES (59, 'goB5EYojyC9d', '8eea64fee738124cdf357266e9792ecfdf31fd29339021da88d694b8c6d146c7', 3, '2017-06-04 20:18:34');
INSERT INTO auth_tokens VALUES (60, 'Fb4PdPRSLBGq', 'e2fc53eb9dd8ffcac71e12b96ecc6b4c9102d3bab646b156ae624d07acbc987d', 9, '2017-06-04 20:21:19');
INSERT INTO auth_tokens VALUES (61, 'FNII0L2ZeYOz', '9a2aa493ca04f3ede46a767d168fb1d0d503622dad28cd627073e12fa9cf8a15', 2, '2017-06-04 20:24:18');
INSERT INTO auth_tokens VALUES (62, 'zHhi54oxpPHE', 'f45c80ab378b70e82c40e160694f2101e501045b264ed9ffb6fda776f1926180', 1, '2017-06-04 20:24:54');
INSERT INTO auth_tokens VALUES (63, '6OZOMKc0wbNO', '721ea1159669bf4c9c0734d65565542ec5aaf2cf40d67f17064af01e97c56932', 9, '2017-06-04 20:25:30');
INSERT INTO auth_tokens VALUES (64, 'eKFfgrXAM1tk', '4062064446e498848354386957cd6a6b6f7b4ffd5e01bded744e0a5f60c35628', 2, '2017-06-04 20:42:44');
INSERT INTO auth_tokens VALUES (65, 'b4IYXvUfRsTT', 'aabbc9152aec691910b6c53b8d1f4ef7010e0d5e4606d5db06604d93a7a7b3f7', 2, '2017-06-04 21:41:42');
INSERT INTO auth_tokens VALUES (66, 'dJ16xibhRnV6', '279bba3cdee43dc890c38185052f27f183a953d02c218d772b9125b3777bbd5d', 9, '2017-06-04 23:14:58');


--
-- Name: auth_tokens_id_seq; Type: SEQUENCE SET; Schema: final; Owner: lbaw1611
--

SELECT pg_catalog.setval('auth_tokens_id_seq', 66, true);


--
-- Data for Name: category; Type: TABLE DATA; Schema: final; Owner: lbaw1611
--

INSERT INTO category VALUES (1, 'lacus at');
INSERT INTO category VALUES (2, 'morbi quis');
INSERT INTO category VALUES (3, 'condimentum curabitur');
INSERT INTO category VALUES (4, 'erat volutpat');


--
-- Name: category_id_seq; Type: SEQUENCE SET; Schema: final; Owner: lbaw1611
--

SELECT pg_catalog.setval('category_id_seq', 4, true);


--
-- Data for Name: client; Type: TABLE DATA; Schema: final; Owner: lbaw1611
--

INSERT INTO client VALUES (12, 'Samuel', 'Dunn', '86-(942)484-8838', 793003429, true);
INSERT INTO client VALUES (5, 'Billy', 'Oliver', '86-(314)682-7936', 259503957, false);
INSERT INTO client VALUES (6, 'Gregory', 'Roberts', '62-(469)864-8387', 444734915, false);
INSERT INTO client VALUES (10, 'Steve', 'Parker', '51-(840)634-5601', 179227220, true);
INSERT INTO client VALUES (7, 'Cynthia', 'Perez', '86-(681)397-4933', 515379170, false);
INSERT INTO client VALUES (8, 'Sharon', 'Sanders', '86-(876)357-7126', 513705944, false);
INSERT INTO client VALUES (4, 'Stephen', 'Diaz', '381-(739)660-8814', 304052557, false);
INSERT INTO client VALUES (3, 'Michael', 'Black', '86-(536)681-5654', 740082966, false);
INSERT INTO client VALUES (20, 'Ines', 'Proenca', NULL, NULL, false);
INSERT INTO client VALUES (9, 'Virginia', 'White', '51-(218)822-6692', 604895239, true);
INSERT INTO client VALUES (21, 'Tiago', 'Almeida', NULL, NULL, false);
INSERT INTO client VALUES (11, 'George', 'Chavez', '54-(131)424-2625', 286365347, true);


--
-- Data for Name: client-address; Type: TABLE DATA; Schema: final; Owner: lbaw1611
--

INSERT INTO "client-address" VALUES (7, 5);
INSERT INTO "client-address" VALUES (12, 7);
INSERT INTO "client-address" VALUES (9, 3);
INSERT INTO "client-address" VALUES (6, 8);
INSERT INTO "client-address" VALUES (8, 5);
INSERT INTO "client-address" VALUES (12, 6);
INSERT INTO "client-address" VALUES (11, 4);
INSERT INTO "client-address" VALUES (12, 8);
INSERT INTO "client-address" VALUES (21, 57);
INSERT INTO "client-address" VALUES (3, 59);


--
-- Data for Name: favorite; Type: TABLE DATA; Schema: final; Owner: lbaw1611
--

INSERT INTO favorite VALUES (3, 7);
INSERT INTO favorite VALUES (3, 5);
INSERT INTO favorite VALUES (9, 7);


--
-- Data for Name: image; Type: TABLE DATA; Schema: final; Owner: lbaw1611
--

INSERT INTO image VALUES (1, 'assorted1.jpg', 1);
INSERT INTO image VALUES (2, 'pink.jpg', 5);
INSERT INTO image VALUES (3, 'pink2.jpg', 5);
INSERT INTO image VALUES (4, 'Hot Chocolate.jpg', 9);
INSERT INTO image VALUES (5, 'assorted2.jpg', 1);
INSERT INTO image VALUES (6, 'assorted3.jpg', 1);
INSERT INTO image VALUES (7, 'Bunny1.jpg', 6);
INSERT INTO image VALUES (8, 'chocolateBundle.jpg', 3);
INSERT INTO image VALUES (10, 'Bunny2.jpg', 6);
INSERT INTO image VALUES (11, 'Doisy Dam.jpg', 4);
INSERT INTO image VALUES (12, 'chocolateBundle2.jpg', 3);
INSERT INTO image VALUES (13, 'box1.jpg', 2);
INSERT INTO image VALUES (15, 'box2.jpg', 2);
INSERT INTO image VALUES (17, 'pink3.jpg', 5);
INSERT INTO image VALUES (18, 'Egg1.jpg', 7);
INSERT INTO image VALUES (19, 'Mackie Bars.jpg', 8);
INSERT INTO image VALUES (21, 'Doisy Dam2.jpg', 4);
INSERT INTO image VALUES (22, 'assorted4.jpg', 1);
INSERT INTO image VALUES (24, 'box3.jpg', 1);
INSERT INTO image VALUES (26, 'Doisy Dam3.jpg', 4);
INSERT INTO image VALUES (30, 'pink4.jpg', 5);
INSERT INTO image VALUES (9, 'bouquet1.jpg', 10);
INSERT INTO image VALUES (14, 'chocchips.jpg', 27);
INSERT INTO image VALUES (44, 'white-chocolate.jpg', 34);
INSERT INTO image VALUES (45, 'MothersDay.jpg', 35);
INSERT INTO image VALUES (46, 'christmas.jpg', 36);
INSERT INTO image VALUES (47, 'FathersDay.jpg', 37);
INSERT INTO image VALUES (48, 'ForthProduct.jpg', 38);
INSERT INTO image VALUES (49, 'brigadeiro.jpg', 39);
INSERT INTO image VALUES (50, 'Md1.jpg', 40);
INSERT INTO image VALUES (53, 'Mandarines1.jpg', 43);
INSERT INTO image VALUES (54, 'vd2.jpg', 44);
INSERT INTO image VALUES (55, 'SixthProduct.jpg', 46);
INSERT INTO image VALUES (56, 'h2.jpg', 47);
INSERT INTO image VALUES (57, 'h1.jpg', 48);
INSERT INTO image VALUES (58, 'choco-animals.jpg', 49);


--
-- Name: image_id_seq; Type: SEQUENCE SET; Schema: final; Owner: lbaw1611
--

SELECT pg_catalog.setval('image_id_seq', 58, true);


--
-- Data for Name: kind; Type: TABLE DATA; Schema: final; Owner: lbaw1611
--

INSERT INTO kind VALUES (2, 8);
INSERT INTO kind VALUES (1, 2);
INSERT INTO kind VALUES (3, 3);
INSERT INTO kind VALUES (3, 1);
INSERT INTO kind VALUES (2, 2);
INSERT INTO kind VALUES (2, 6);
INSERT INTO kind VALUES (4, 6);
INSERT INTO kind VALUES (2, 3);
INSERT INTO kind VALUES (3, 6);
INSERT INTO kind VALUES (2, 4);
INSERT INTO kind VALUES (1, 9);
INSERT INTO kind VALUES (4, 10);
INSERT INTO kind VALUES (2, 26);
INSERT INTO kind VALUES (2, 27);
INSERT INTO kind VALUES (4, 27);
INSERT INTO kind VALUES (1, 34);
INSERT INTO kind VALUES (4, 34);
INSERT INTO kind VALUES (1, 35);
INSERT INTO kind VALUES (2, 35);
INSERT INTO kind VALUES (3, 36);
INSERT INTO kind VALUES (2, 37);
INSERT INTO kind VALUES (2, 38);
INSERT INTO kind VALUES (3, 38);
INSERT INTO kind VALUES (2, 39);
INSERT INTO kind VALUES (4, 39);
INSERT INTO kind VALUES (2, 40);
INSERT INTO kind VALUES (4, 40);
INSERT INTO kind VALUES (4, 43);
INSERT INTO kind VALUES (2, 44);
INSERT INTO kind VALUES (2, 46);
INSERT INTO kind VALUES (1, 47);
INSERT INTO kind VALUES (2, 47);
INSERT INTO kind VALUES (3, 48);
INSERT INTO kind VALUES (2, 49);
INSERT INTO kind VALUES (3, 49);
INSERT INTO kind VALUES (3, 5);
INSERT INTO kind VALUES (3, 7);


--
-- Data for Name: occasion-gallery; Type: TABLE DATA; Schema: final; Owner: lbaw1611
--

INSERT INTO "occasion-gallery" VALUES (1, 11);
INSERT INTO "occasion-gallery" VALUES (1, 15);
INSERT INTO "occasion-gallery" VALUES (1, 14);
INSERT INTO "occasion-gallery" VALUES (3, 17);
INSERT INTO "occasion-gallery" VALUES (3, 30);
INSERT INTO "occasion-gallery" VALUES (3, 2);
INSERT INTO "occasion-gallery" VALUES (2, 7);
INSERT INTO "occasion-gallery" VALUES (2, 18);
INSERT INTO "occasion-gallery" VALUES (4, 19);
INSERT INTO "occasion-gallery" VALUES (4, 11);
INSERT INTO "occasion-gallery" VALUES (5, 9);
INSERT INTO "occasion-gallery" VALUES (5, 14);
INSERT INTO "occasion-gallery" VALUES (5, 57);
INSERT INTO "occasion-gallery" VALUES (6, 1);
INSERT INTO "occasion-gallery" VALUES (6, 48);


--
-- Data for Name: order; Type: TABLE DATA; Schema: final; Owner: lbaw1611
--

INSERT INTO "order" VALUES (1, 3, 12, 'requested', '2017-01-04', NULL, NULL, NULL);
INSERT INTO "order" VALUES (2, 4, 12, 'canceled', '2017-01-07', '2017-01-09', NULL, NULL);
INSERT INTO "order" VALUES (3, 1, 5, 'requested', '2017-01-12', NULL, NULL, NULL);
INSERT INTO "order" VALUES (4, 2, 11, 'requested', '2017-01-11', NULL, NULL, NULL);
INSERT INTO "order" VALUES (5, 2, 12, 'sent', '2017-01-08', NULL, '2017-01-20', NULL);
INSERT INTO "order" VALUES (6, 1, 5, 'canceled', '2017-01-12', '2017-01-05', NULL, NULL);
INSERT INTO "order" VALUES (7, 3, 10, 'requested', '2017-01-05', NULL, NULL, NULL);
INSERT INTO "order" VALUES (8, 7, 3, 'sent', '2017-01-08', NULL, '2017-01-21', NULL);
INSERT INTO "order" VALUES (9, 6, 8, 'requested', '2017-01-07', NULL, NULL, NULL);
INSERT INTO "order" VALUES (10, 2, 6, 'requested', '2017-01-04', NULL, NULL, NULL);
INSERT INTO "order" VALUES (11, 6, 6, 'sent', '2017-01-13', NULL, '2017-01-18', NULL);
INSERT INTO "order" VALUES (13, 4, 11, 'arrived', '2017-01-08', NULL, '2017-01-19', '2017-02-05');
INSERT INTO "order" VALUES (14, 7, 6, 'requested', '2017-01-09', NULL, NULL, NULL);
INSERT INTO "order" VALUES (15, 8, 10, 'sent', '2017-01-08', NULL, '2017-01-16', NULL);
INSERT INTO "order" VALUES (16, 7, 6, 'requested', '2017-01-09', NULL, NULL, NULL);
INSERT INTO "order" VALUES (21, 1, 3, 'canceled', '2017-04-28', '2017-05-28', NULL, NULL);
INSERT INTO "order" VALUES (20, 6, 7, 'canceled', '2017-01-05', '2017-05-28', '2017-01-19', NULL);
INSERT INTO "order" VALUES (19, 2, 9, 'canceled', '2017-01-11', '2017-05-28', '2017-01-17', '2017-02-05');
INSERT INTO "order" VALUES (18, 4, 3, 'canceled', '2017-01-08', '2017-05-28', '2017-01-17', NULL);
INSERT INTO "order" VALUES (17, 2, 9, 'canceled', '2017-01-04', '2017-05-28', '2017-01-19', '2017-01-29');
INSERT INTO "order" VALUES (23, 59, 9, 'requested', '2017-05-28', NULL, NULL, NULL);


--
-- Data for Name: order-product; Type: TABLE DATA; Schema: final; Owner: lbaw1611
--

INSERT INTO "order-product" VALUES (6, 4, 5);
INSERT INTO "order-product" VALUES (5, 6, 5);
INSERT INTO "order-product" VALUES (9, 9, 1);
INSERT INTO "order-product" VALUES (17, 3, 1);
INSERT INTO "order-product" VALUES (19, 4, 3);
INSERT INTO "order-product" VALUES (7, 3, 5);
INSERT INTO "order-product" VALUES (17, 4, 5);
INSERT INTO "order-product" VALUES (9, 5, 2);
INSERT INTO "order-product" VALUES (11, 8, 2);
INSERT INTO "order-product" VALUES (13, 5, 1);
INSERT INTO "order-product" VALUES (7, 4, 2);
INSERT INTO "order-product" VALUES (10, 5, 5);
INSERT INTO "order-product" VALUES (13, 2, 5);
INSERT INTO "order-product" VALUES (7, 6, 1);
INSERT INTO "order-product" VALUES (6, 2, 1);
INSERT INTO "order-product" VALUES (16, 3, 5);
INSERT INTO "order-product" VALUES (16, 8, 3);
INSERT INTO "order-product" VALUES (4, 4, 2);
INSERT INTO "order-product" VALUES (10, 9, 2);
INSERT INTO "order-product" VALUES (5, 5, 2);
INSERT INTO "order-product" VALUES (17, 5, 3);
INSERT INTO "order-product" VALUES (10, 4, 4);
INSERT INTO "order-product" VALUES (16, 6, 5);
INSERT INTO "order-product" VALUES (19, 5, 2);
INSERT INTO "order-product" VALUES (8, 9, 5);
INSERT INTO "order-product" VALUES (14, 1, 4);
INSERT INTO "order-product" VALUES (19, 3, 5);
INSERT INTO "order-product" VALUES (1, 4, 4);
INSERT INTO "order-product" VALUES (7, 2, 3);
INSERT INTO "order-product" VALUES (16, 4, 3);
INSERT INTO "order-product" VALUES (15, 6, 3);
INSERT INTO "order-product" VALUES (2, 4, 4);
INSERT INTO "order-product" VALUES (4, 2, 5);
INSERT INTO "order-product" VALUES (4, 3, 2);
INSERT INTO "order-product" VALUES (6, 8, 4);
INSERT INTO "order-product" VALUES (5, 9, 4);
INSERT INTO "order-product" VALUES (2, 1, 5);
INSERT INTO "order-product" VALUES (11, 2, 2);
INSERT INTO "order-product" VALUES (6, 6, 3);
INSERT INTO "order-product" VALUES (16, 9, 4);
INSERT INTO "order-product" VALUES (16, 2, 2);
INSERT INTO "order-product" VALUES (7, 5, 4);
INSERT INTO "order-product" VALUES (11, 7, 3);
INSERT INTO "order-product" VALUES (3, 6, 5);
INSERT INTO "order-product" VALUES (8, 4, 1);
INSERT INTO "order-product" VALUES (23, 36, 3);
INSERT INTO "order-product" VALUES (23, 10, 1);
INSERT INTO "order-product" VALUES (23, 7, 2);
INSERT INTO "order-product" VALUES (23, 2, 3);


--
-- Name: order_id_seq; Type: SEQUENCE SET; Schema: final; Owner: lbaw1611
--

SELECT pg_catalog.setval('order_id_seq', 23, true);


--
-- Data for Name: product; Type: TABLE DATA; Schema: final; Owner: lbaw1611
--

INSERT INTO product VALUES (34, 'WhiteChoc', 2, 4, 'thjmkklk,', true, NULL, NULL);
INSERT INTO product VALUES (8, 'Mackie Bars', 15.3400002, 38, 'turpis donec posuere metus vitae ipsum aliquam non mauris morbi non lectus aliquam sit amet', true, NULL, NULL);
INSERT INTO product VALUES (40, 'Mum''s Choco', 14.5, 42, 'Aliquam id diam vel mi venenatis sagittis et ut libero. Aenean maximus nisl eget tincidunt.', true, NULL, NULL);
INSERT INTO product VALUES (38, 'Strawberry Bundle II', 34.9900017, 6, 'bbcb bb n  cdudi,lpppp', true, NULL, 6);
INSERT INTO product VALUES (1, 'Milk Bundle', 24.2600002, 18, 'morbi a ipsum integer a nibh in quis justo maecenas rhoncus aliquam lacus', true, NULL, 6);
INSERT INTO product VALUES (47, 'Little Flowers', 4.98999977, 23, 'Etiam semper augue tellus, id malesuada urna sodales non. Mauris in lobortis mauris. Vivamus et sem molestie, pharetra dui sed.', true, NULL, 5);
INSERT INTO product VALUES (43, 'Orange Chocolate', 3.8499999, 600, 'Sed congue justo a enim hendrerit luctus. Nullam interdum sapien vitae arcu placerat pharetra. Aliquam sit amet commodo nisi, a.', true, NULL, 6);
INSERT INTO product VALUES (49, 'Kawaii', 25.9899998, 34, 'Proin non mattis odio. Sed lacinia mauris diam, id scelerisque nibh pretium ac. Vivamus vestibulum felis in tellus dignissim, quis.', true, NULL, NULL);
INSERT INTO product VALUES (3, 'ChocoMix', 12.1499996, 13, 'ligula sit amet eleifend pede libero quis orci nullam molestie nibh in lectus', true, NULL, 2);
INSERT INTO product VALUES (36, 'Sweet Holidays', 21.9899998, 31, 'hchvscv cg  ', true, NULL, NULL);
INSERT INTO product VALUES (10, 'ChocoBouquet', 35.4300003, 41, 'ultrices posuere cubilia curae mauris viverra diam vitae quam suspendisse', true, NULL, 1);
INSERT INTO product VALUES (9, 'Hot Chocolate', 35.1399994, 2, 'nonummy integer non velit donec diam neque vestibulum eget vulputate ut ultrices', true, NULL, NULL);
INSERT INTO product VALUES (6, 'Chocolate Bunny', 33.8300018, 0, 'metus aenean fermentum donec ut mauris eget massa tempor convallis nulla', true, NULL, 2);
INSERT INTO product VALUES (35, 'Dear Mom', 25.9899998, 50, 'A gift for mothers day', true, NULL, NULL);
INSERT INTO product VALUES (37, 'Tools', 12.9899998, 34, 'bcc dbchdcbdhebbvvv', true, NULL, NULL);
INSERT INTO product VALUES (39, 'Crunchy Choco', 5.98999977, 34, 'Lorem ipsum', true, NULL, NULL);
INSERT INTO product VALUES (44, 'Sweetheart Squares', 14.9899998, 124, 'Etiam semper augue tellus, id malesuada urna sodales non. Mauris in lobortis mauris. Vivamus et sem molestie, pharetra dui sed.', true, NULL, NULL);
INSERT INTO product VALUES (46, 'Choco Bundle', 29.9899998, 4, 'Etiam semper augue tellus, id malesuada urna sodales non. Mauris in lobortis mauris. Vivamus et sem molestie, pharetra dui sed.', false, NULL, NULL);
INSERT INTO product VALUES (48, 'Cake Pops', 34.9900017, 100, 'Donec finibus sit amet libero vel tincidunt. Sed tempor pharetra massa, sed mattis augue. Morbi quis lorem luctus, laoreet turpis.', true, NULL, 5);
INSERT INTO product VALUES (27, 'Chocolate Potato Chips', 13, 23, 'Lorem ipsum', true, NULL, 5);
INSERT INTO product VALUES (7, 'Chocolate Egg', 30.9300003, 31, 'blandit nam nulla integer pede justo lacinia eget tincidunt eget tempus vel pede', true, 1, 2);
INSERT INTO product VALUES (2, 'Dark Bundle', 37.4900017, 0, 'in lectus pellentesque at nulla suspendisse potenti cras in purus eu magna vulputate', true, 2, NULL);
INSERT INTO product VALUES (26, 'Sweet Praline', 7, 20, 'Lorem ipsum', false, NULL, NULL);
INSERT INTO product VALUES (4, 'Doisy&Dam', 10.5900002, 13, 'in faucibus orci luctus et ultrices posuere cubilia curae mauris viverra diam vitae quam', true, 2, 1);
INSERT INTO product VALUES (5, 'Strawlate', 29.5100002, 35, 'in tempus sit amet sem fusce consequat nulla nisl nunc nisl duis bibendum felis', true, 1, NULL);


--
-- Name: product_id_seq; Type: SEQUENCE SET; Schema: final; Owner: lbaw1611
--

SELECT pg_catalog.setval('product_id_seq', 49, true);


--
-- Data for Name: promotion; Type: TABLE DATA; Schema: final; Owner: lbaw1611
--

INSERT INTO promotion VALUES (1, 70, '2017-03-01', '2017-03-31');
INSERT INTO promotion VALUES (2, 50, '2017-03-01', '2017-03-31');


--
-- Name: promotion_id_seq; Type: SEQUENCE SET; Schema: final; Owner: lbaw1611
--

SELECT pg_catalog.setval('promotion_id_seq', 2, true);


--
-- Data for Name: review; Type: TABLE DATA; Schema: final; Owner: lbaw1611
--

INSERT INTO review VALUES (60, 3, '2017-05-28', 'Praesent quis neque placerat, convallis ligula faucibus, cursus felis. Nulla facilisi. Fusce ac lacinia enim. Curabitur quis lorem ac nibh venenatis maximus. ', 9, 43);
INSERT INTO review VALUES (2, 2, '2016-07-23', 'morbi non lectus aliquam sit amet diam in magna bibendum imperdiet nullam orci pede venenatis non sodales sed tincidunt eu', 12, 9);
INSERT INTO review VALUES (5, 5, '2016-12-02', 'massa tempor convallis nulla neque libero convallis eget eleifend luctus ultricies eu nibh', 12, 7);
INSERT INTO review VALUES (8, 1, '2016-08-04', 'porta volutpat erat quisque erat eros viverra eget congue eget semper rutrum nulla', 10, 1);
INSERT INTO review VALUES (11, 1, '2016-03-27', 'blandit ultrices enim lorem ipsum dolor sit amet consectetuer adipiscing elit proin interdum', 12, 10);
INSERT INTO review VALUES (16, 5, '2016-04-14', 'pretium iaculis diam erat fermentum justo nec condimentum neque sapien placerat ante nulla justo', 6, 7);
INSERT INTO review VALUES (21, 3, '2016-07-24', 'est risus auctor sed tristique in tempus sit amet sem', 8, 8);
INSERT INTO review VALUES (24, 2, '2016-12-04', 'in sapien iaculis congue vivamus metus arcu adipiscing molestie hendrerit at vulputate vitae nisl aenean lectus', 11, 9);
INSERT INTO review VALUES (25, 4, '2016-05-11', 'pellentesque eget nunc donec quis orci eget orci vehicula condimentum curabitur in libero ut massa volutpat convallis morbi odio odio', 6, 9);
INSERT INTO review VALUES (28, 3, '2016-09-19', 'et commodo vulputate justo in blandit ultrices enim lorem ipsum dolor sit amet consectetuer adipiscing elit proin interdum', 8, 7);
INSERT INTO review VALUES (32, 2, '2017-02-14', 'in libero ut massa volutpat convallis morbi odio odio elementum eu interdum eu', 12, 2);
INSERT INTO review VALUES (34, 5, '2016-05-13', 'et ultrices posuere cubilia curae mauris viverra diam vitae quam suspendisse potenti nullam porttitor lacus at turpis donec posuere metus', 11, 5);
INSERT INTO review VALUES (37, 3, '2017-03-04', 'nec dui luctus rutrum nulla tellus in sagittis dui vel nisl duis ac nibh', 10, 2);
INSERT INTO review VALUES (40, 3, '2016-06-02', 'molestie nibh in lectus pellentesque at nulla suspendisse potenti cras in purus', 11, 8);
INSERT INTO review VALUES (58, 4, '2017-05-28', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nec nunc purus. Integer sed quam nec neque aliquam pellentesque. Donec malesuada turpis ornare, ultrices purus sed, iaculis eros. Nulla eget quam risus. Etiam elementum odio lectus, vitae tristique ipsum sollicitudin nec. In.', 9, 49);
INSERT INTO review VALUES (59, 2, '2017-05-28', 'Cras euismod tincidunt ultrices. Nulla vitae ante nec orci imperdiet fringilla. Nunc eu felis quis massa feugiat euismod. Nulla sodales nisi ut turpis hendrerit facilisis. Sed quam nisl, tristique ac ligula ac, sollicitudin rhoncus.', 9, 43);


--
-- Name: review_id_seq; Type: SEQUENCE SET; Schema: final; Owner: lbaw1611
--

SELECT pg_catalog.setval('review_id_seq', 60, true);


--
-- Data for Name: special-occasion; Type: TABLE DATA; Schema: final; Owner: lbaw1611
--

INSERT INTO "special-occasion" VALUES (1, 'Father''s Day', '2017-03-01', '2017-03-31');
INSERT INTO "special-occasion" VALUES (2, 'Easter Collection', '2017-04-10', '2017-05-10');
INSERT INTO "special-occasion" VALUES (3, 'Valentines Day', '2017-01-30', '2017-03-30');
INSERT INTO "special-occasion" VALUES (4, 'Mother''s Day', '2017-04-15', '2017-05-15');
INSERT INTO "special-occasion" VALUES (5, 'Spring', '2017-03-21', '2017-06-21');
INSERT INTO "special-occasion" VALUES (6, 'Summer', '2017-05-20', '2017-09-21');


--
-- Name: special-occasion_id_seq; Type: SEQUENCE SET; Schema: final; Owner: lbaw1611
--

SELECT pg_catalog.setval('"special-occasion_id_seq"', 6, true);


--
-- Data for Name: to-go; Type: TABLE DATA; Schema: final; Owner: lbaw1611
--

INSERT INTO "to-go" VALUES (3, 7, 1);
INSERT INTO "to-go" VALUES (3, 5, 1);


--
-- Data for Name: user; Type: TABLE DATA; Schema: final; Owner: lbaw1611
--

INSERT INTO "user" VALUES (1, 'admin1', 'admin1@admin.co.uk', '$2y$12$Nu6./veATYccGWXuhNUB2uaZAdDuSMOHA4v3j.HinmUc6ycwrDN8y', true);
INSERT INTO "user" VALUES (4, 'chenry1', 'jmatthews1@techcrunch.com', '$2y$12$/olgnIbUYfNX4CFQB2DGeOoJuYiFDyB8lU1IgMVx2MFaQYuXK5xfC', false);
INSERT INTO "user" VALUES (5, 'jgonzales2', 'mgomez2@ning.com', '$2y$12$0kn9nE5O/no7t3rfuSwHSOmUP.c3w30FxD2jgFODLowF2MeoK0652', false);
INSERT INTO "user" VALUES (6, 'jfields3', 'tspencer3@techcrunch.com', '$2y$12$kvsIgbZJXNhBymPgZgHvQ.jMYraIaZOLnRolxrSxA6BDJSdZe.caG', false);
INSERT INTO "user" VALUES (7, 'rhamilton4', 'pbell4@amazon.co.uk', '$2y$12$U1eSExy..X3bvegJDI8eEeQCJWWVW2joK7X0NKGeFaGf7TUbM8Q8i', false);
INSERT INTO "user" VALUES (8, 'mmcdonald5', 'bhansen5@csmonitor.com', '$2y$12$zK1rhTxguRjLBnOIW..zUOUU6rZ7gGcML9MlroxTwCQtQE7eWYw2W', false);
INSERT INTO "user" VALUES (10, 'erose7', 'psims7@walmart.com', '$2y$12$EnWvg5Kcb8pt4hvVQ6/pP.kVRtwYTWNGjCdTwKJq3HqsqoC4PkT1m', false);
INSERT INTO "user" VALUES (11, 'tsmith8', 'jpowell8@aol.com', '$2y$12$Cfw0O9g0Ygn8xTx32SgYjO2RpiTzbIvya6snL.zp45F0umNdFiMhy', false);
INSERT INTO "user" VALUES (12, 'esullivan9', 'jparker9@plala.or.jp', '$2y$12$y1rCDvqvIr.orI1fpB6PVOnoB8VrN2kf8APv7mBmwXUbH4tVqbuvO', false);
INSERT INTO "user" VALUES (9, 'lbaw1611', 'gwright6@tripod.com', '$2y$12$lRKXf54QZ5Bf32pO21kf.ec2EuqDA8EonhRS3W/Dqo2pj1n87V2PK', false);
INSERT INTO "user" VALUES (3, 'mblack123', 'mblack@telegraph.co.uk', '$2y$12$J7GMq8Xv2bE46Mj1q7mrUerzo6r.Rf/vP5A2ujQW83BpmAyzZun1a', false);
INSERT INTO "user" VALUES (20, 'inesfproenca', 'inesfproenca@gmail.com', '$2y$12$jQTLi2PA7nPDkfL0/s28heSL4pcfQhP8iaR83SqaR6t2HuG9F3zYq', false);
INSERT INTO "user" VALUES (2, 'admin2', 'admin2@admin.co.uk', '$2y$12$jQTLi2PA7nPDkfL0/s28heSL4pcfQhP8iaR83SqaR6t2HuG9F3zYq', true);
INSERT INTO "user" VALUES (21, 'tiagobalm', 'tiagoalmeida.95@hotmail.com', '$2y$12$yHYZYHLpeXEMH4LA0OR10uaJI6nakW870JKUoaCNoX.2hVZIjFYWC', false);


--
-- Name: user_id_seq; Type: SEQUENCE SET; Schema: final; Owner: lbaw1611
--

SELECT pg_catalog.setval('user_id_seq', 21, true);


--
-- Data for Name: zip-code; Type: TABLE DATA; Schema: final; Owner: lbaw1611
--

INSERT INTO "zip-code" VALUES (1, '6163', 'Tari');
INSERT INTO "zip-code" VALUES (2, '6863', 'Beddeng');
INSERT INTO "zip-code" VALUES (3, '956', 'Al Fujayrah');
INSERT INTO "zip-code" VALUES (4, '8464', 'Orléans');
INSERT INTO "zip-code" VALUES (13, '4510-765', 'Porto');
INSERT INTO "zip-code" VALUES (14, '4510-654', 'Porto');
INSERT INTO "zip-code" VALUES (15, 'adfds', 'adsf');
INSERT INTO "zip-code" VALUES (16, '564354-534', 'Porto');
INSERT INTO "zip-code" VALUES (17, '4510-541', 'Porto');
INSERT INTO "zip-code" VALUES (18, '4560-454', 'Porto');
INSERT INTO "zip-code" VALUES (19, '4510-543', 'Porto');
INSERT INTO "zip-code" VALUES (20, '4510-523', 'Porto');
INSERT INTO "zip-code" VALUES (22, '4659-673', 'Porto');
INSERT INTO "zip-code" VALUES (23, '4560-543', 'Porto');
INSERT INTO "zip-code" VALUES (32, '4510-453', 'Porto');
INSERT INTO "zip-code" VALUES (33, '4435-245', 'Porto');
INSERT INTO "zip-code" VALUES (34, 'g,fb', 'kjbkj');
INSERT INTO "zip-code" VALUES (35, 'dryftg', 'rtyg');
INSERT INTO "zip-code" VALUES (36, '4510-532', 'Porto');
INSERT INTO "zip-code" VALUES (37, '', '');


--
-- Name: zip-code_id_seq; Type: SEQUENCE SET; Schema: final; Owner: lbaw1611
--

SELECT pg_catalog.setval('"zip-code_id_seq"', 37, true);


--
-- Name: adress_primarykey; Type: CONSTRAINT; Schema: final; Owner: lbaw1611; Tablespace: 
--

ALTER TABLE ONLY address
    ADD CONSTRAINT adress_primarykey PRIMARY KEY (id);


--
-- Name: auth_tokens_pkey; Type: CONSTRAINT; Schema: final; Owner: lbaw1611; Tablespace: 
--

ALTER TABLE ONLY auth_tokens
    ADD CONSTRAINT auth_tokens_pkey PRIMARY KEY (id);


--
-- Name: category_name_key; Type: CONSTRAINT; Schema: final; Owner: lbaw1611; Tablespace: 
--

ALTER TABLE ONLY category
    ADD CONSTRAINT category_name_key UNIQUE (name);


--
-- Name: category_primarykey; Type: CONSTRAINT; Schema: final; Owner: lbaw1611; Tablespace: 
--

ALTER TABLE ONLY category
    ADD CONSTRAINT category_primarykey PRIMARY KEY (id);


--
-- Name: client_primarykey; Type: CONSTRAINT; Schema: final; Owner: lbaw1611; Tablespace: 
--

ALTER TABLE ONLY client
    ADD CONSTRAINT client_primarykey PRIMARY KEY (id);


--
-- Name: clientadress_primarykey; Type: CONSTRAINT; Schema: final; Owner: lbaw1611; Tablespace: 
--

ALTER TABLE ONLY "client-address"
    ADD CONSTRAINT clientadress_primarykey PRIMARY KEY (iduser, idaddress);


--
-- Name: favorite_primarykey; Type: CONSTRAINT; Schema: final; Owner: lbaw1611; Tablespace: 
--

ALTER TABLE ONLY favorite
    ADD CONSTRAINT favorite_primarykey PRIMARY KEY (iduser, idproduct);


--
-- Name: image_name_key; Type: CONSTRAINT; Schema: final; Owner: lbaw1611; Tablespace: 
--

ALTER TABLE ONLY image
    ADD CONSTRAINT image_name_key UNIQUE (name);


--
-- Name: image_primarykey; Type: CONSTRAINT; Schema: final; Owner: lbaw1611; Tablespace: 
--

ALTER TABLE ONLY image
    ADD CONSTRAINT image_primarykey PRIMARY KEY (id);


--
-- Name: kind_primarykey; Type: CONSTRAINT; Schema: final; Owner: lbaw1611; Tablespace: 
--

ALTER TABLE ONLY kind
    ADD CONSTRAINT kind_primarykey PRIMARY KEY (idcategory, idproduct);


--
-- Name: occasion_gallery_primarykey; Type: CONSTRAINT; Schema: final; Owner: lbaw1611; Tablespace: 
--

ALTER TABLE ONLY "occasion-gallery"
    ADD CONSTRAINT occasion_gallery_primarykey PRIMARY KEY (idspecialoccasion, idimage);


--
-- Name: order_primarykey; Type: CONSTRAINT; Schema: final; Owner: lbaw1611; Tablespace: 
--

ALTER TABLE ONLY "order"
    ADD CONSTRAINT order_primarykey PRIMARY KEY (id);


--
-- Name: order_product_primarykey; Type: CONSTRAINT; Schema: final; Owner: lbaw1611; Tablespace: 
--

ALTER TABLE ONLY "order-product"
    ADD CONSTRAINT order_product_primarykey PRIMARY KEY (idorder, idproduct);


--
-- Name: product_primarykey; Type: CONSTRAINT; Schema: final; Owner: lbaw1611; Tablespace: 
--

ALTER TABLE ONLY product
    ADD CONSTRAINT product_primarykey PRIMARY KEY (id);


--
-- Name: promotion_primarykey; Type: CONSTRAINT; Schema: final; Owner: lbaw1611; Tablespace: 
--

ALTER TABLE ONLY promotion
    ADD CONSTRAINT promotion_primarykey PRIMARY KEY (id);


--
-- Name: review_pk; Type: CONSTRAINT; Schema: final; Owner: lbaw1611; Tablespace: 
--

ALTER TABLE ONLY review
    ADD CONSTRAINT review_pk PRIMARY KEY (id);


--
-- Name: special_occasion_primarykey; Type: CONSTRAINT; Schema: final; Owner: lbaw1611; Tablespace: 
--

ALTER TABLE ONLY "special-occasion"
    ADD CONSTRAINT special_occasion_primarykey PRIMARY KEY (id);


--
-- Name: togo_pk; Type: CONSTRAINT; Schema: final; Owner: lbaw1611; Tablespace: 
--

ALTER TABLE ONLY "to-go"
    ADD CONSTRAINT togo_pk PRIMARY KEY (iduser, idproduct);


--
-- Name: user_email_key; Type: CONSTRAINT; Schema: final; Owner: lbaw1611; Tablespace: 
--

ALTER TABLE ONLY "user"
    ADD CONSTRAINT user_email_key UNIQUE (email);


--
-- Name: user_primarykey; Type: CONSTRAINT; Schema: final; Owner: lbaw1611; Tablespace: 
--

ALTER TABLE ONLY "user"
    ADD CONSTRAINT user_primarykey PRIMARY KEY (id);


--
-- Name: user_username_key; Type: CONSTRAINT; Schema: final; Owner: lbaw1611; Tablespace: 
--

ALTER TABLE ONLY "user"
    ADD CONSTRAINT user_username_key UNIQUE (username);


--
-- Name: zip-code_zipnumber_key; Type: CONSTRAINT; Schema: final; Owner: lbaw1611; Tablespace: 
--

ALTER TABLE ONLY "zip-code"
    ADD CONSTRAINT "zip-code_zipnumber_key" UNIQUE (zipnumber);


--
-- Name: zipcode_primarykey; Type: CONSTRAINT; Schema: final; Owner: lbaw1611; Tablespace: 
--

ALTER TABLE ONLY "zip-code"
    ADD CONSTRAINT zipcode_primarykey PRIMARY KEY (id);


--
-- Name: client_firstname_index; Type: INDEX; Schema: final; Owner: lbaw1611; Tablespace: 
--

CREATE INDEX client_firstname_index ON client USING btree (firstname);


--
-- Name: client_lastname_index; Type: INDEX; Schema: final; Owner: lbaw1611; Tablespace: 
--

CREATE INDEX client_lastname_index ON client USING btree (lastname);


--
-- Name: client_taxpayernumber_index; Type: INDEX; Schema: final; Owner: lbaw1611; Tablespace: 
--

CREATE INDEX client_taxpayernumber_index ON client USING btree (taxpayernumber);


--
-- Name: order_arriveddate_index; Type: INDEX; Schema: final; Owner: lbaw1611; Tablespace: 
--

CREATE INDEX order_arriveddate_index ON "order" USING btree (arriveddate);


--
-- Name: order_canceleddate_index; Type: INDEX; Schema: final; Owner: lbaw1611; Tablespace: 
--

CREATE INDEX order_canceleddate_index ON "order" USING btree (canceleddate);


--
-- Name: order_orderdate_index; Type: INDEX; Schema: final; Owner: lbaw1611; Tablespace: 
--

CREATE INDEX order_orderdate_index ON "order" USING btree (orderdate);


--
-- Name: order_sentdate_index; Type: INDEX; Schema: final; Owner: lbaw1611; Tablespace: 
--

CREATE INDEX order_sentdate_index ON "order" USING btree (sentdate);


--
-- Name: order_state_index; Type: INDEX; Schema: final; Owner: lbaw1611; Tablespace: 
--

CREATE INDEX order_state_index ON "order" USING btree (state);


--
-- Name: product_name_index; Type: INDEX; Schema: final; Owner: lbaw1611; Tablespace: 
--

CREATE INDEX product_name_index ON product USING gin (to_tsvector('english'::regconfig, details));


--
-- Name: product_price_index; Type: INDEX; Schema: final; Owner: lbaw1611; Tablespace: 
--

CREATE INDEX product_price_index ON product USING btree (price);


--
-- Name: promotion_beginningdate_index; Type: INDEX; Schema: final; Owner: lbaw1611; Tablespace: 
--

CREATE INDEX promotion_beginningdate_index ON promotion USING btree (beginningdate);


--
-- Name: promotion_enddate_index; Type: INDEX; Schema: final; Owner: lbaw1611; Tablespace: 
--

CREATE INDEX promotion_enddate_index ON promotion USING btree (enddate);


--
-- Name: specialoccassion_beginningdate_index; Type: INDEX; Schema: final; Owner: lbaw1611; Tablespace: 
--

CREATE INDEX specialoccassion_beginningdate_index ON "special-occasion" USING btree (beginningdate);


--
-- Name: specialoccassion_enddate_index; Type: INDEX; Schema: final; Owner: lbaw1611; Tablespace: 
--

CREATE INDEX specialoccassion_enddate_index ON "special-occasion" USING btree (enddate);


--
-- Name: product-delete; Type: TRIGGER; Schema: final; Owner: lbaw1611
--

CREATE TRIGGER "product-delete" AFTER UPDATE ON product FOR EACH ROW EXECUTE PROCEDURE update_product_delete();


--
-- Name: update-order; Type: TRIGGER; Schema: final; Owner: lbaw1611
--

CREATE TRIGGER "update-order" BEFORE UPDATE ON "order" FOR EACH ROW EXECUTE PROCEDURE update_order();


--
-- Name: update-orderproduct; Type: TRIGGER; Schema: final; Owner: lbaw1611
--

CREATE TRIGGER "update-orderproduct" AFTER INSERT OR DELETE OR UPDATE ON "order-product" FOR EACH ROW EXECUTE PROCEDURE update_orderproduct();


--
-- Name: update-user; Type: TRIGGER; Schema: final; Owner: lbaw1611
--

CREATE TRIGGER "update-user" AFTER UPDATE ON client FOR EACH ROW EXECUTE PROCEDURE update_client();


--
-- Name: address_idzipcode_fkey; Type: FK CONSTRAINT; Schema: final; Owner: lbaw1611
--

ALTER TABLE ONLY address
    ADD CONSTRAINT address_idzipcode_fkey FOREIGN KEY (idzipcode) REFERENCES "zip-code"(id) ON DELETE CASCADE;


--
-- Name: auth_tokens_userid_fkey; Type: FK CONSTRAINT; Schema: final; Owner: lbaw1611
--

ALTER TABLE ONLY auth_tokens
    ADD CONSTRAINT auth_tokens_userid_fkey FOREIGN KEY (userid) REFERENCES "user"(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: client-address_idaddress_fkey; Type: FK CONSTRAINT; Schema: final; Owner: lbaw1611
--

ALTER TABLE ONLY "client-address"
    ADD CONSTRAINT "client-address_idaddress_fkey" FOREIGN KEY (idaddress) REFERENCES address(id) ON DELETE CASCADE;


--
-- Name: client-address_iduser_fkey; Type: FK CONSTRAINT; Schema: final; Owner: lbaw1611
--

ALTER TABLE ONLY "client-address"
    ADD CONSTRAINT "client-address_iduser_fkey" FOREIGN KEY (iduser) REFERENCES client(id) ON DELETE CASCADE;


--
-- Name: client_id_fkey; Type: FK CONSTRAINT; Schema: final; Owner: lbaw1611
--

ALTER TABLE ONLY client
    ADD CONSTRAINT client_id_fkey FOREIGN KEY (id) REFERENCES "user"(id) ON DELETE CASCADE;


--
-- Name: favorite_idproduct_fkey; Type: FK CONSTRAINT; Schema: final; Owner: lbaw1611
--

ALTER TABLE ONLY favorite
    ADD CONSTRAINT favorite_idproduct_fkey FOREIGN KEY (idproduct) REFERENCES product(id) ON DELETE CASCADE;


--
-- Name: favorite_iduser_fkey; Type: FK CONSTRAINT; Schema: final; Owner: lbaw1611
--

ALTER TABLE ONLY favorite
    ADD CONSTRAINT favorite_iduser_fkey FOREIGN KEY (iduser) REFERENCES client(id) ON DELETE CASCADE;


--
-- Name: image_idproduct_fkey; Type: FK CONSTRAINT; Schema: final; Owner: lbaw1611
--

ALTER TABLE ONLY image
    ADD CONSTRAINT image_idproduct_fkey FOREIGN KEY (idproduct) REFERENCES product(id) ON DELETE CASCADE;


--
-- Name: kind_idcategory_fkey; Type: FK CONSTRAINT; Schema: final; Owner: lbaw1611
--

ALTER TABLE ONLY kind
    ADD CONSTRAINT kind_idcategory_fkey FOREIGN KEY (idcategory) REFERENCES category(id) ON DELETE CASCADE;


--
-- Name: kind_idproduct_fkey; Type: FK CONSTRAINT; Schema: final; Owner: lbaw1611
--

ALTER TABLE ONLY kind
    ADD CONSTRAINT kind_idproduct_fkey FOREIGN KEY (idproduct) REFERENCES product(id) ON DELETE CASCADE;


--
-- Name: occasion-gallery_idimage_fkey; Type: FK CONSTRAINT; Schema: final; Owner: lbaw1611
--

ALTER TABLE ONLY "occasion-gallery"
    ADD CONSTRAINT "occasion-gallery_idimage_fkey" FOREIGN KEY (idimage) REFERENCES image(id) ON DELETE CASCADE;


--
-- Name: occasion-gallery_idspecialoccasion_fkey; Type: FK CONSTRAINT; Schema: final; Owner: lbaw1611
--

ALTER TABLE ONLY "occasion-gallery"
    ADD CONSTRAINT "occasion-gallery_idspecialoccasion_fkey" FOREIGN KEY (idspecialoccasion) REFERENCES "special-occasion"(id) ON DELETE CASCADE;


--
-- Name: order-product_idorder_fkey; Type: FK CONSTRAINT; Schema: final; Owner: lbaw1611
--

ALTER TABLE ONLY "order-product"
    ADD CONSTRAINT "order-product_idorder_fkey" FOREIGN KEY (idorder) REFERENCES "order"(id) ON DELETE CASCADE;


--
-- Name: order-product_idproduct_fkey; Type: FK CONSTRAINT; Schema: final; Owner: lbaw1611
--

ALTER TABLE ONLY "order-product"
    ADD CONSTRAINT "order-product_idproduct_fkey" FOREIGN KEY (idproduct) REFERENCES product(id) ON DELETE RESTRICT;


--
-- Name: order_idaddress_fkey; Type: FK CONSTRAINT; Schema: final; Owner: lbaw1611
--

ALTER TABLE ONLY "order"
    ADD CONSTRAINT order_idaddress_fkey FOREIGN KEY (idaddress) REFERENCES address(id) ON DELETE RESTRICT;


--
-- Name: order_idclient_fkey; Type: FK CONSTRAINT; Schema: final; Owner: lbaw1611
--

ALTER TABLE ONLY "order"
    ADD CONSTRAINT order_idclient_fkey FOREIGN KEY (idclient) REFERENCES client(id) ON DELETE RESTRICT;


--
-- Name: product_idpromotion_fkey; Type: FK CONSTRAINT; Schema: final; Owner: lbaw1611
--

ALTER TABLE ONLY product
    ADD CONSTRAINT product_idpromotion_fkey FOREIGN KEY (idpromotion) REFERENCES promotion(id) ON DELETE SET NULL;


--
-- Name: product_idspecialoccasion_fkey; Type: FK CONSTRAINT; Schema: final; Owner: lbaw1611
--

ALTER TABLE ONLY product
    ADD CONSTRAINT product_idspecialoccasion_fkey FOREIGN KEY (idspecialoccasion) REFERENCES "special-occasion"(id) ON DELETE SET NULL;


--
-- Name: review_idproduct_fkey; Type: FK CONSTRAINT; Schema: final; Owner: lbaw1611
--

ALTER TABLE ONLY review
    ADD CONSTRAINT review_idproduct_fkey FOREIGN KEY (idproduct) REFERENCES product(id) ON DELETE CASCADE;


--
-- Name: review_iduser_fkey; Type: FK CONSTRAINT; Schema: final; Owner: lbaw1611
--

ALTER TABLE ONLY review
    ADD CONSTRAINT review_iduser_fkey FOREIGN KEY (iduser) REFERENCES client(id) ON DELETE SET NULL;


--
-- Name: to-go_idproduct_fkey; Type: FK CONSTRAINT; Schema: final; Owner: lbaw1611
--

ALTER TABLE ONLY "to-go"
    ADD CONSTRAINT "to-go_idproduct_fkey" FOREIGN KEY (idproduct) REFERENCES product(id) ON DELETE CASCADE;


--
-- Name: to-go_iduser_fkey; Type: FK CONSTRAINT; Schema: final; Owner: lbaw1611
--

ALTER TABLE ONLY "to-go"
    ADD CONSTRAINT "to-go_iduser_fkey" FOREIGN KEY (iduser) REFERENCES client(id) ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--