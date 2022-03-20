CREATE TABLE users (
u_id SERIAL,
username VARCHAR(255) NOT NULL,
password VARCHAR(255) NOT NULL,
firstName VARCHAR(255) NOT NULL,
lastName VARCHAR(255) NOT NULL,
country VARCHAR(255) NOT NULL,
sex INT NOT NULL,
registered_date DATE NOT NULL,
dob DATE NOT NULL,
role INT NOT NULL,
PRIMARY KEY (u_id,username));

CREATE TABLE filmRelatedPerson (
frp_id SERIAL PRIMARY KEY,
role VARCHAR(255) NOT NULL,
u_id INT NOT NULL );

CREATE TABLE film (
f_id SERIAL PRIMARY KEY,
title VARCHAR(255) NOT NULL,
releaseDate DATE NOT NULL,
productionCountry VARCHAR(255) NOT NULL,
minAgeAudience INT NOT NULL,
leadActor VARCHAR(255),
leadActress VARCHAR(255),
director VARCHAR(255) NOT NULL,
writer VARCHAR(255) NOT NULL,
genre VARCHAR(255) NOT NULL,
filmAddedById INT NOT NULL);

CREATE TABLE ratingFilm (
rf_id SERIAL PRIMARY KEY,
u_id INT NOT NULL,
f_id INT NOT NULL,
rating FLOAT NOT NULL);

ALTER TABLE filmrelatedperson
ADD CONSTRAINT frp_unique UNIQUE (frp_id);

ALTER TABLE film
ADD CONSTRAINT film_unique UNIQUE (f_id);

ALTER TABLE ratingfilm
ADD CONSTRAINT ratingfilm_unique UNIQUE (rf_id);

ALTER TABLE users
ADD CONSTRAINT users_unique UNIQUE (u_id);

ALTER TABLE film
add constraint fk_first
foreign key(filmaddedbyid)
references users(u_id);

ALTER TABLE filmrelatedperson
add constraint fk_first
foreign key(u_id)
references users(u_id);

ALTER TABLE ratingfilm
add constraint fk_first
foreign key(f_id)
references film(f_id);

ALTER TABLE ratingfilm
add constraint fk_second
foreign key(u_id)
references users(u_id);


INSERT INTO public.users(username, password, firstname, lastname, country, sex, registered_date, dob,role)
	VALUES ('abrar','asdasda', 'abrar', 'mahmud', 'ban', 1, '2022-09-05','2022-09-05',2);


    while ($row = pg_fetch_row($sql)) {
      $role = $_GET['role']
      if ($role=='1') {
        session_start();
        $_SESSION['username'] = $row[0];
        header("Location: admin.php");
      }
      /*for film related person*/
      else if ($username=="admin") {
        session_start();
        $_SESSION['username'] = $row[0];
        header("Location: film_related_person.php");
      }
      else{

        session_start();
        $_SESSION['username'] = $row[0];
        header("Location: users.php");

      }
    }