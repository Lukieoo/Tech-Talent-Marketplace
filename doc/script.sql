create table users_details
(
    id          serial
        constraint users_details_pk
            primary key,
    name        varchar(100) not null,
    profession  varchar(150) not null,
    description varchar(350) not null,
    photo       varchar(300)
);

alter table users_details
    owner to "user";

create table users
(
    id               serial
        constraint users_pk
            primary key,
    id_users_details integer      not null
        constraint users_users_details_id_fk
            references users_details,
    email            varchar(150) not null,
    password         varchar(150) not null
);

alter table users
    owner to "user";

create table location
(
    id_expert_details integer          not null
        constraint location_users_details_id_fk
            references users_details,
    latitude          double precision not null,
    longitude         double precision not null
);

alter table location
    owner to "user";


