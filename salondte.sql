--
-- PostgreSQL database dump
--

-- Dumped from database version 13.3
-- Dumped by pg_dump version 13.3

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: akun; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.akun (
    id integer NOT NULL,
    nama character varying(100) NOT NULL,
    kata_sandi character varying(100) NOT NULL
);


ALTER TABLE public.akun OWNER TO postgres;

--
-- Name: akun_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.akun_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.akun_id_seq OWNER TO postgres;

--
-- Name: akun_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.akun_id_seq OWNED BY public.akun.id;


--
-- Name: customer; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.customer (
    customer_id character varying(50) NOT NULL,
    customer_name character varying(50),
    address text,
    phone_num integer,
    email text
);


ALTER TABLE public.customer OWNER TO postgres;

--
-- Name: employee; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.employee (
    employee_id character varying(50) NOT NULL,
    employee_name character varying(50),
    address text,
    phone_num integer,
    email text
);


ALTER TABLE public.employee OWNER TO postgres;

--
-- Name: seatorder; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.seatorder (
    id integer NOT NULL,
    nama character varying(100),
    tanggal date,
    services character varying(100)
);


ALTER TABLE public.seatorder OWNER TO postgres;

--
-- Name: seatorder_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.seatorder_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.seatorder_id_seq OWNER TO postgres;

--
-- Name: seatorder_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.seatorder_id_seq OWNED BY public.seatorder.id;


--
-- Name: servis; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.servis (
    service_id character varying(50) NOT NULL,
    service_name character varying(50),
    service_type character varying(50),
    price integer
);


ALTER TABLE public.servis OWNER TO postgres;

--
-- Name: transaction; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.transaction (
    transaction_id character varying(50) NOT NULL,
    customer_id character varying(50),
    customer_name character varying(50),
    bill_amount integer
);


ALTER TABLE public.transaction OWNER TO postgres;

--
-- Name: akun id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.akun ALTER COLUMN id SET DEFAULT nextval('public.akun_id_seq'::regclass);


--
-- Name: seatorder id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.seatorder ALTER COLUMN id SET DEFAULT nextval('public.seatorder_id_seq'::regclass);


--
-- Data for Name: akun; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.akun (id, nama, kata_sandi) FROM stdin;
17	reza	rahadi
21	admin	root
\.


--
-- Data for Name: customer; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.customer (customer_id, customer_name, address, phone_num, email) FROM stdin;
1	tes	jakarta	0	tes@gmail.com
\.


--
-- Data for Name: employee; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.employee (employee_id, employee_name, address, phone_num, email) FROM stdin;
1	Doni	Jalan Nusa Kambangan	833	doni_nusa@gmail.com
2	Rahmat	Jalan Kenangan	899	rahmat_purdadi@gmail.com
3	Niko	Jalan Kerinduan	899	adaniko@gmail.com
\.


--
-- Data for Name: seatorder; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.seatorder (id, nama, tanggal, services) FROM stdin;
209	reza	2012-05-09	HairColour
190	re	2020-04-20	HairBlow
197	reza	2020-04-20	HairColour
198	reza	2020-04-20	HairBlow
200	rafi	2002-05-22	HairBlow
203	rafi	2021-09-21	HairCut
204	reza	2020-12-31	HairMask
\.


--
-- Data for Name: servis; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.servis (service_id, service_name, service_type, price) FROM stdin;
2	HairHerbalMask	HairStyle	100000
3	HairCut	HairStyle	20000
4	HairBlow	HairStyle	75000
1	HairColour	HairStyle	50000
\.


--
-- Data for Name: transaction; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.transaction (transaction_id, customer_id, customer_name, bill_amount) FROM stdin;
A	1	tes	90
\.


--
-- Name: akun_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.akun_id_seq', 24, true);


--
-- Name: seatorder_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.seatorder_id_seq', 212, true);


--
-- Name: akun akun_kata_sandi_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.akun
    ADD CONSTRAINT akun_kata_sandi_key UNIQUE (kata_sandi);


--
-- Name: akun akun_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.akun
    ADD CONSTRAINT akun_pkey PRIMARY KEY (id);


--
-- Name: akun akun_username_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.akun
    ADD CONSTRAINT akun_username_key UNIQUE (nama);


--
-- Name: customer customer_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.customer
    ADD CONSTRAINT customer_pkey PRIMARY KEY (customer_id);


--
-- Name: employee employee_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.employee
    ADD CONSTRAINT employee_pkey PRIMARY KEY (employee_id);


--
-- Name: seatorder seatorder_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.seatorder
    ADD CONSTRAINT seatorder_pkey PRIMARY KEY (id);


--
-- Name: servis service_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.servis
    ADD CONSTRAINT service_pkey PRIMARY KEY (service_id);


--
-- Name: transaction transaction_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.transaction
    ADD CONSTRAINT transaction_pkey PRIMARY KEY (transaction_id);


--
-- PostgreSQL database dump complete
--

