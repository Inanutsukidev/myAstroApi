<?php

it('Liste des utilisateurs')->get('api/users')->assertStatus(200);
it('Infos d\'un utilisateur')->get('api/user/1')->assertStatus(200);