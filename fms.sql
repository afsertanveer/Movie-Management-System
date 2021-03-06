PGDMP         ,                z            FlimManagementSystem    14.1    14.1 8    (           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            )           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            *           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            +           1262    16403    FlimManagementSystem    DATABASE     z   CREATE DATABASE "FlimManagementSystem" WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'English_United States.1252';
 &   DROP DATABASE "FlimManagementSystem";
                postgres    false            ?            1255    25190 ?   add_film(character varying, date, character varying, integer, character varying, character varying, character varying, character varying, character varying, integer)    FUNCTION     m  CREATE FUNCTION public.add_film(title character varying, releasedate date, genre character varying, minageaudience integer, productioncountry character varying, leadactor character varying, leadactress character varying, director character varying, writer character varying, filmaddedby integer) RETURNS void
    LANGUAGE plpgsql
    AS $$
BEGIN
    INSERT INTO film (title, releasedate, genre, minageaudience, productioncountry, leadactor, leadactress, director, writer, filmaddedbyid) VALUES (title, releasedate, genre, minageaudience, productioncountry, leadactor, leadactress, director, writer, filmaddedby);
END
$$;
 '  DROP FUNCTION public.add_film(title character varying, releasedate date, genre character varying, minageaudience integer, productioncountry character varying, leadactor character varying, leadactress character varying, director character varying, writer character varying, filmaddedby integer);
       public          postgres    false            ?            1255    25222 .   add_rating(integer, integer, double precision)    FUNCTION     ?   CREATE FUNCTION public.add_rating(u_id integer, f_id integer, rating double precision) RETURNS void
    LANGUAGE plpgsql
    AS $$
BEGIN
    INSERT INTO ratingfilm (u_id, f_id,rating) VALUES (u_id, f_id,rating);
END
$$;
 V   DROP FUNCTION public.add_rating(u_id integer, f_id integer, rating double precision);
       public          postgres    false            ?            1255    25181 +   add_role_in_frp(character varying, integer)    FUNCTION     ?   CREATE FUNCTION public.add_role_in_frp(role character varying, u_id integer) RETURNS void
    LANGUAGE plpgsql
    AS $$
BEGIN
    INSERT INTO filmrelatedperson (role, u_id) VALUES (role, u_id);
END
$$;
 L   DROP FUNCTION public.add_role_in_frp(role character varying, u_id integer);
       public          postgres    false            ?            1255    25179 ?   add_user(character varying, character varying, character varying, character varying, character varying, integer, date, date, integer)    FUNCTION     ?  CREATE FUNCTION public.add_user(username character varying, password character varying, firstname character varying, lastname character varying, country character varying, sex integer, registered_date date, dob date, role integer) RETURNS void
    LANGUAGE plpgsql
    AS $$
BEGIN
    INSERT INTO users(username, password, firstname, lastname, country, sex, registered_date, dob, role) VALUES (username, password, firstname, lastname, country, sex, registered_date, dob, role);
END
$$;
 ?   DROP FUNCTION public.add_user(username character varying, password character varying, firstname character varying, lastname character varying, country character varying, sex integer, registered_date date, dob date, role integer);
       public          postgres    false            ?            1255    25250 ?   admin_update_film(integer, character varying, date, integer, character varying, character varying, character varying, character varying, character varying, character varying)    FUNCTION     ?  CREATE FUNCTION public.admin_update_film(film_id integer, ftitle character varying, release_date date, min_age_audience integer, prod_country character varying, update_leadactr character varying, update_leadactrress character varying, update_director character varying, update_writer character varying, update_genre character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$
begin
	UPDATE film
	SET title = ftitle,  releasedate = release_date, productioncountry = prod_country, minageaudience = min_age_audience, leadactor = update_leadActr, leadactress = update_leadActrress, director= update_director, writer=update_writer, genre=update_genre
	WHERE f_id = film_id;
end;
$$;
 N  DROP FUNCTION public.admin_update_film(film_id integer, ftitle character varying, release_date date, min_age_audience integer, prod_country character varying, update_leadactr character varying, update_leadactrress character varying, update_director character varying, update_writer character varying, update_genre character varying);
       public          postgres    false            ?            1255    25252 a   admin_update_frp(character varying, character varying, date, integer, character varying, integer)    FUNCTION     ?  CREATE FUNCTION public.admin_update_frp(fname character varying, lname character varying, birthday date, gender integer, land character varying, user_id integer) RETURNS void
    LANGUAGE plpgsql
    AS $$
begin
	UPDATE users
	SET  firstname=fname, lastname=lname, country=land, sex=gender, dob=birthday
	FROM filmrelatedperson
	WHERE users.u_id = user_id AND  users.u_id=filmrelatedperson.u_id;
end;
$$;
 ?   DROP FUNCTION public.admin_update_frp(fname character varying, lname character varying, birthday date, gender integer, land character varying, user_id integer);
       public          postgres    false            ?            1255    25249 ?   frp_update_film(character varying, date, integer, character varying, character varying, character varying, character varying, character varying, character varying)    FUNCTION     ?  CREATE FUNCTION public.frp_update_film(ftitle character varying, release_date date, min_age_audience integer, prod_country character varying, update_leadactr character varying, update_leadactrress character varying, update_director character varying, update_writer character varying, update_genre character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$
begin
	UPDATE film
	SET title = ftitle,  releasedate = release_date, productioncountry = prod_country, minageaudience = min_age_audience, leadactor = update_leadActr, leadactress = update_leadActrress, director= update_director, writer=update_writer, genre=update_genre
	WHERE title = ftitle;
end;
$$;
 ;  DROP FUNCTION public.frp_update_film(ftitle character varying, release_date date, min_age_audience integer, prod_country character varying, update_leadactr character varying, update_leadactrress character varying, update_director character varying, update_writer character varying, update_genre character varying);
       public          postgres    false            ?            1255    25251 ?   frp_update_film(integer, character varying, date, integer, character varying, character varying, character varying, character varying, character varying, character varying)    FUNCTION     ?  CREATE FUNCTION public.frp_update_film(film_id integer, ftitle character varying, release_date date, min_age_audience integer, prod_country character varying, update_leadactr character varying, update_leadactrress character varying, update_director character varying, update_writer character varying, update_genre character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$
begin
	UPDATE film
	SET title = ftitle,  releasedate = release_date, productioncountry = prod_country, minageaudience = min_age_audience, leadactor = update_leadActr, leadactress = update_leadActrress, director= update_director, writer=update_writer, genre=update_genre
	WHERE f_id = film_id;
end;
$$;
 L  DROP FUNCTION public.frp_update_film(film_id integer, ftitle character varying, release_date date, min_age_audience integer, prod_country character varying, update_leadactr character varying, update_leadactrress character varying, update_director character varying, update_writer character varying, update_genre character varying);
       public          postgres    false            ?            1255    24578    get_film(character varying)    FUNCTION     J  CREATE FUNCTION public.get_film(film_title character varying) RETURNS TABLE(title character varying, release_date date, genre character varying, min_age_audience numeric, production_country character varying, role character varying)
    LANGUAGE plpgsql
    AS $$
BEGIN
    SELECT * 
	FROM films 
	WHERE title=film_title;
END
$$;
 =   DROP FUNCTION public.get_film(film_title character varying);
       public          postgres    false            ?            1255    24579    get_film1(character varying)    FUNCTION     Q  CREATE FUNCTION public.get_film1(film_title character varying) RETURNS TABLE(title character varying, release_date date, genre character varying, min_age_audience numeric, production_country character varying, role character varying)
    LANGUAGE plpgsql
    AS $$
BEGIN
    SELECT * 
	FROM films 
	WHERE films.title=film_title;
END
$$;
 >   DROP FUNCTION public.get_film1(film_title character varying);
       public          postgres    false            ?            1255    25229    get_film_filmrate(integer)    FUNCTION     W  CREATE FUNCTION public.get_film_filmrate(user_id integer) RETURNS TABLE(title character varying, rating double precision, rf_id integer)
    LANGUAGE plpgsql
    AS $$
BEGIN
	return query
    SELECT film.title, ratingfilm.rating,  ratingfilm.rf_id 
	FROM film, ratingfilm 
	WHERE film.f_id=ratingfilm.f_id and ratingfilm.u_id=user_id;
END
$$;
 9   DROP FUNCTION public.get_film_filmrate(user_id integer);
       public          postgres    false            ?            1255    16483    remove_film(character varying)    FUNCTION     ?   CREATE FUNCTION public.remove_film(film_title character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$
BEGIN
    DELETE FROM films WHERE title=film_title;
END
$$;
 @   DROP FUNCTION public.remove_film(film_title character varying);
       public          postgres    false            ?            1255    25217    remove_frp(character varying)    FUNCTION     ?   CREATE FUNCTION public.remove_frp(role_person character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$
BEGIN
    DELETE FROM film where (leadactor=role_person) OR (leadactress=role_person) OR (director=role_person) OR (writer=role_person);
END
$$;
 @   DROP FUNCTION public.remove_frp(role_person character varying);
       public          postgres    false            ?            1255    25227 e   update_admin_profile(character varying, character varying, date, integer, character varying, integer)    FUNCTION     T  CREATE FUNCTION public.update_admin_profile(fname character varying, lname character varying, birthday date, gender integer, land character varying, user_id integer) RETURNS void
    LANGUAGE plpgsql
    AS $$
begin
	UPDATE users
	SET  firstname=fname, lastname=lname, country=land, sex=gender, dob=birthday
	WHERE u_id = user_id;
end;
$$;
 ?   DROP FUNCTION public.update_admin_profile(fname character varying, lname character varying, birthday date, gender integer, land character varying, user_id integer);
       public          postgres    false            ?            1255    25215 c   update_frp_profile(character varying, character varying, date, integer, character varying, integer)    FUNCTION     ?  CREATE FUNCTION public.update_frp_profile(fname character varying, lname character varying, birthday date, gender integer, land character varying, user_id integer) RETURNS void
    LANGUAGE plpgsql
    AS $$
begin
	UPDATE users
	SET  firstname=fname, lastname=lname, country=land, sex=gender, dob=birthday
	FROM filmrelatedperson
	WHERE users.u_id = user_id AND  users.u_id=filmrelatedperson.u_id;
end;
$$;
 ?   DROP FUNCTION public.update_frp_profile(fname character varying, lname character varying, birthday date, gender integer, land character varying, user_id integer);
       public          postgres    false            ?            1255    25207 d   update_user_profile(character varying, character varying, date, integer, character varying, integer)    FUNCTION     Q  CREATE FUNCTION public.update_user_profile(fname character varying, lname character varying, birthday date, gender integer, land character varying, user_id integer) RETURNS void
    LANGUAGE plpgsql
    AS $$
begin
	UPDATE users
	SET  firstname=fname, lastname=lname, country=land, sex=gender, dob=birthday
	WHERE u_id=user_id;
end;
$$;
 ?   DROP FUNCTION public.update_user_profile(fname character varying, lname character varying, birthday date, gender integer, land character varying, user_id integer);
       public          postgres    false            ?            1255    25186    view_all_admins()    FUNCTION     V  CREATE FUNCTION public.view_all_admins() RETURNS TABLE(fname character varying, lname character varying, birthday date, gender integer, land character varying, joined_date date)
    LANGUAGE plpgsql
    AS $$
begin
	return query 
		select
			firstname, lastname, dob, sex, country, registered_date
		from
			users
		where
			role=1;
end;
$$;
 (   DROP FUNCTION public.view_all_admins();
       public          postgres    false            ?            1255    25193    view_all_films()    FUNCTION       CREATE FUNCTION public.view_all_films() RETURNS TABLE(mov_title character varying, released_date date, genre_name character varying, min_audience_age integer, pro_country character varying, lead_actor character varying, lead_actress character varying, directr character varying, writr character varying, filmaddedby integer)
    LANGUAGE plpgsql
    AS $$
begin
	return query 
		select
			title, releasedate, genre, minageaudience, productioncountry, leadactor, leadactress,director,writer, filmaddedbyid
		from
			film;
end;
$$;
 '   DROP FUNCTION public.view_all_films();
       public          postgres    false            ?            1255    25200    view_all_frps()    FUNCTION     ?  CREATE FUNCTION public.view_all_frps() RETURNS TABLE(fname character varying, lname character varying, birthday date, gender integer, land character varying, joined_date date, role1 character varying)
    LANGUAGE plpgsql
    AS $$
begin
	return query 
		select
			firstname, lastname, dob, sex, country, registered_date, filmrelatedperson.role
		from
			users, filmrelatedperson
		where users.u_id = filmrelatedperson.u_id;
end;
$$;
 &   DROP FUNCTION public.view_all_frps();
       public          postgres    false            ?            1255    25224    view_all_users()    FUNCTION     ]  CREATE FUNCTION public.view_all_users() RETURNS TABLE(fname character varying, lname character varying, birthday date, gender integer, land character varying, joined_date date, role integer)
    LANGUAGE plpgsql
    AS $$
begin
	return query 
		select
			firstname, lastname, dob, sex, country, registered_date, users.role
		from
			users;
end;
$$;
 '   DROP FUNCTION public.view_all_users();
       public          postgres    false            ?            1259    25135    film    TABLE     ?  CREATE TABLE public.film (
    f_id integer NOT NULL,
    title character varying(255) NOT NULL,
    releasedate date NOT NULL,
    productioncountry character varying(255) NOT NULL,
    minageaudience integer NOT NULL,
    leadactor character varying(255),
    leadactress character varying(255),
    director character varying(255) NOT NULL,
    writer character varying(255) NOT NULL,
    genre character varying(255) NOT NULL,
    filmaddedbyid integer NOT NULL
);
    DROP TABLE public.film;
       public         heap    postgres    false            ?            1259    25134    film_f_id_seq    SEQUENCE     ?   CREATE SEQUENCE public.film_f_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 $   DROP SEQUENCE public.film_f_id_seq;
       public          postgres    false    214            ,           0    0    film_f_id_seq    SEQUENCE OWNED BY     ?   ALTER SEQUENCE public.film_f_id_seq OWNED BY public.film.f_id;
          public          postgres    false    213            ?            1259    25128    filmrelatedperson    TABLE     ?   CREATE TABLE public.filmrelatedperson (
    frp_id integer NOT NULL,
    role character varying(255) NOT NULL,
    u_id integer NOT NULL
);
 %   DROP TABLE public.filmrelatedperson;
       public         heap    postgres    false            ?            1259    25127    filmrelatedperson_frp_id_seq    SEQUENCE     ?   CREATE SEQUENCE public.filmrelatedperson_frp_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 3   DROP SEQUENCE public.filmrelatedperson_frp_id_seq;
       public          postgres    false    212            -           0    0    filmrelatedperson_frp_id_seq    SEQUENCE OWNED BY     ]   ALTER SEQUENCE public.filmrelatedperson_frp_id_seq OWNED BY public.filmrelatedperson.frp_id;
          public          postgres    false    211            ?            1259    25144 
   ratingfilm    TABLE     ?   CREATE TABLE public.ratingfilm (
    rf_id integer NOT NULL,
    u_id integer NOT NULL,
    f_id integer NOT NULL,
    rating double precision NOT NULL
);
    DROP TABLE public.ratingfilm;
       public         heap    postgres    false            ?            1259    25143    ratingfilm_rf_id_seq    SEQUENCE     ?   CREATE SEQUENCE public.ratingfilm_rf_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 +   DROP SEQUENCE public.ratingfilm_rf_id_seq;
       public          postgres    false    216            .           0    0    ratingfilm_rf_id_seq    SEQUENCE OWNED BY     M   ALTER SEQUENCE public.ratingfilm_rf_id_seq OWNED BY public.ratingfilm.rf_id;
          public          postgres    false    215            ?            1259    25119    users    TABLE     ?  CREATE TABLE public.users (
    u_id integer NOT NULL,
    username character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    firstname character varying(255) NOT NULL,
    lastname character varying(255) NOT NULL,
    country character varying(255) NOT NULL,
    sex integer NOT NULL,
    registered_date date NOT NULL,
    dob date NOT NULL,
    role integer NOT NULL
);
    DROP TABLE public.users;
       public         heap    postgres    false            ?            1259    25118    users_u_id_seq    SEQUENCE     ?   CREATE SEQUENCE public.users_u_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE public.users_u_id_seq;
       public          postgres    false    210            /           0    0    users_u_id_seq    SEQUENCE OWNED BY     A   ALTER SEQUENCE public.users_u_id_seq OWNED BY public.users.u_id;
          public          postgres    false    209            ?           2604    25138 	   film f_id    DEFAULT     f   ALTER TABLE ONLY public.film ALTER COLUMN f_id SET DEFAULT nextval('public.film_f_id_seq'::regclass);
 8   ALTER TABLE public.film ALTER COLUMN f_id DROP DEFAULT;
       public          postgres    false    214    213    214            ?           2604    25131    filmrelatedperson frp_id    DEFAULT     ?   ALTER TABLE ONLY public.filmrelatedperson ALTER COLUMN frp_id SET DEFAULT nextval('public.filmrelatedperson_frp_id_seq'::regclass);
 G   ALTER TABLE public.filmrelatedperson ALTER COLUMN frp_id DROP DEFAULT;
       public          postgres    false    212    211    212            ?           2604    25147    ratingfilm rf_id    DEFAULT     t   ALTER TABLE ONLY public.ratingfilm ALTER COLUMN rf_id SET DEFAULT nextval('public.ratingfilm_rf_id_seq'::regclass);
 ?   ALTER TABLE public.ratingfilm ALTER COLUMN rf_id DROP DEFAULT;
       public          postgres    false    216    215    216                       2604    25122 
   users u_id    DEFAULT     h   ALTER TABLE ONLY public.users ALTER COLUMN u_id SET DEFAULT nextval('public.users_u_id_seq'::regclass);
 9   ALTER TABLE public.users ALTER COLUMN u_id DROP DEFAULT;
       public          postgres    false    209    210    210            #          0    25135    film 
   TABLE DATA           ?   COPY public.film (f_id, title, releasedate, productioncountry, minageaudience, leadactor, leadactress, director, writer, genre, filmaddedbyid) FROM stdin;
    public          postgres    false    214   ?c       !          0    25128    filmrelatedperson 
   TABLE DATA           ?   COPY public.filmrelatedperson (frp_id, role, u_id) FROM stdin;
    public          postgres    false    212   Hd       %          0    25144 
   ratingfilm 
   TABLE DATA           ?   COPY public.ratingfilm (rf_id, u_id, f_id, rating) FROM stdin;
    public          postgres    false    216   ?d                 0    25119    users 
   TABLE DATA           x   COPY public.users (u_id, username, password, firstname, lastname, country, sex, registered_date, dob, role) FROM stdin;
    public          postgres    false    210   ,e       0           0    0    film_f_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('public.film_f_id_seq', 65, true);
          public          postgres    false    213            1           0    0    filmrelatedperson_frp_id_seq    SEQUENCE SET     K   SELECT pg_catalog.setval('public.filmrelatedperson_frp_id_seq', 30, true);
          public          postgres    false    211            2           0    0    ratingfilm_rf_id_seq    SEQUENCE SET     B   SELECT pg_catalog.setval('public.ratingfilm_rf_id_seq', 8, true);
          public          postgres    false    215            3           0    0    users_u_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.users_u_id_seq', 42, true);
          public          postgres    false    209            ?           2606    25142    film film_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.film
    ADD CONSTRAINT film_pkey PRIMARY KEY (f_id);
 8   ALTER TABLE ONLY public.film DROP CONSTRAINT film_pkey;
       public            postgres    false    214            ?           2606    25154    film film_unique 
   CONSTRAINT     K   ALTER TABLE ONLY public.film
    ADD CONSTRAINT film_unique UNIQUE (f_id);
 :   ALTER TABLE ONLY public.film DROP CONSTRAINT film_unique;
       public            postgres    false    214            ?           2606    25133 (   filmrelatedperson filmrelatedperson_pkey 
   CONSTRAINT     j   ALTER TABLE ONLY public.filmrelatedperson
    ADD CONSTRAINT filmrelatedperson_pkey PRIMARY KEY (frp_id);
 R   ALTER TABLE ONLY public.filmrelatedperson DROP CONSTRAINT filmrelatedperson_pkey;
       public            postgres    false    212            ?           2606    25152    filmrelatedperson frp_unique 
   CONSTRAINT     Y   ALTER TABLE ONLY public.filmrelatedperson
    ADD CONSTRAINT frp_unique UNIQUE (frp_id);
 F   ALTER TABLE ONLY public.filmrelatedperson DROP CONSTRAINT frp_unique;
       public            postgres    false    212            ?           2606    25149    ratingfilm ratingfilm_pkey 
   CONSTRAINT     [   ALTER TABLE ONLY public.ratingfilm
    ADD CONSTRAINT ratingfilm_pkey PRIMARY KEY (rf_id);
 D   ALTER TABLE ONLY public.ratingfilm DROP CONSTRAINT ratingfilm_pkey;
       public            postgres    false    216            ?           2606    25156    ratingfilm ratingfilm_unique 
   CONSTRAINT     X   ALTER TABLE ONLY public.ratingfilm
    ADD CONSTRAINT ratingfilm_unique UNIQUE (rf_id);
 F   ALTER TABLE ONLY public.ratingfilm DROP CONSTRAINT ratingfilm_unique;
       public            postgres    false    216            ?           2606    25126    users users_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (u_id, username);
 :   ALTER TABLE ONLY public.users DROP CONSTRAINT users_pkey;
       public            postgres    false    210    210            ?           2606    25158    users users_unique 
   CONSTRAINT     M   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_unique UNIQUE (u_id);
 <   ALTER TABLE ONLY public.users DROP CONSTRAINT users_unique;
       public            postgres    false    210            #   ?   x?u̽
?0????*?T??յ?N?-??rhB{$M M@?ޢ????;|<?.OS@??ԪP?P{?v?lC???:p???}????ZA?'6Z???l?)?/.????n?v?????Ńs<Ckٓ3??<?>?H?z'?+!???9?      !   ?   x?M?K?0Dיà?8??.lP?????*a?ݳ??c???????$?ay?u>?oi??c>???A	???`:???U?2?&?zc?[?3??,???? s?!?o??*?TG,k??_?"??뉰8?p?? ??K?      %   =   x???  ?7)?Q?^??>d'a?w?p??ɫ"?ע%R?%?W????#??^???
?         V  x?e?Mn?0???)rW?	???E?MH?M%d???`????Hi*!??'?y?cΡ1FY\???W?;??h[?T?H??0??sB????\*????&?:??D?????,~??U??$΁R?$4$?Ǥ%?3}:?????k\??l&?0hx??<??PF	?.??M??R?*????y???Fc7j????9???uU? ???LS?W?'w?@?1??Xa?rhS??֙?S?.]a5ޙ??Q??I???I??J?&qP?)????n}???Q?tE??ż%?R???}^w??HF~?
&??]+???p?m7??G? VեT?n??:?n&???>_<???"??     