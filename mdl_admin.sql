create database mdl_salle;
create role mdl_admin password 'admin' login;
grant all on database mdl_salle to mdl_admin;