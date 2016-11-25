<?php

$config = array(
        'login' => array(
                array(
                        'field' => 'email',
                        'label' => 'email',
                        'rules' => 'trim|required|callback__email_check',
                        'errors' =>
                        array
                        (
                            'required' => 'Debes ingresar un %s.',
                            '_email_check' => 'Este %s no está registrado.'
                        )
                      ),
                array(
                        'field' => 'password',
                        'label' => 'contraseña',
                        'rules' => 'required|callback__password_check',
                        'errors' =>
                        array
                        (
                            'required' => 'Debes ingresar una %s.',
                            '_password_check' => 'La %s es incorrecta.'
                        )
                )
        ),
        'register' => array(
                array(
                        'field' => 'email',
                        'label' => 'email',
                        'rules' => 'required|valid_email|is_unique[account.acc_email]',
                        'errors' =>
                        array
                        (
                            'required' => 'Debes ingresar un %s.',
                            'valid_email' => 'Ingresa un %s válido (usuario@ejemplo.com ).',
                            'is_unique' => 'Este correo ya está registrado.'
                        )
                ),
                array(
                        'field' => 'first_name',
                        'label' => 'Primer Nombre',
                        'rules' => 'required|trim|alpha',
                        'errors' =>
                        array
                        (
                            'required' => 'Debes ingresar tu %s.',
                            'alpha' => '¿Acaso eres C-3PO?. Ingresa un nombre humano XD.'
                        )
                ),
                array(
                        'field' => 'father_surname',
                        'label' => 'Appelido Paterno',
                        'rules' => 'trim|alpha',
                        'errors' =>
                        array
                        (
                            'alpha' => 'lol ¿Eres pariente de R2-D2?. Tu apellido no puede contener números XD.'
                        )
                ),
                array(
                        'field' => 'password',
                        'label' => 'contraseña',
                        'rules' => 'required|alpha_numeric|min_length[8]',
                        'errors' =>
                        array
                        (
                            'required' => 'Debes ingresar una %s.',
                            'alpha_numeric' => 'Ingresa una %s alfanumérica de mínimo 8 carácteres.',
                            'min_length' => 'Ingresa una %s alfanumérica de mínimo 8 carácteres.'
                        )
                ),
                array(
                        'field' => 'passconf',
                        'label' => 'contraseña de confirmación',
                        'rules' => 'required|matches[password]',
                        'errors' =>
                        array
                        (
                            'required' => 'Debes ingresar una %s.',
                            'matches' => 'La %s no coincide con la primera.'
                        )
                )
        ),
        'password' => array(
                array(
                        'field' => 'old_password',
                        'label' => 'contraseña actual',
                        'rules' => 'required|callback__password_check',
                        'errors' =>
                        array
                        (
                            'required' => 'Debes ingresar tu %s.',
                            '_password_check' => 'La %s es incorrecta.'
                        )
                ),
                array(
                        'field' => 'new_password',
                        'label' => 'contraseña nueva',
                        'rules' => 'required|trim|alpha_numeric|min_length[8]',
                        'errors' =>
                        array
                        (
                            'required' => 'Debes ingresar una %s.',
                            'alpha' => 'La %s debe ser alfanumérica de 8 carácteres como mínimo.',
                            'min_length' => 'La %s debe ser alfanumérica de 8 carácteres como mínimo.'
                        )
                ),
                array(
                        'field' => 'new_password_conf',
                        'label' => 'contraseña de confirmación',
                        'rules' => 'required|matches[new_password]',
                        'errors' =>
                        array
                        (
                            'required' => 'Debes ingresar una %s.',
                            'matches' => 'La %s no coincide con la nueva.'
                        )
                )
        ),
        'address' => array(
                array(
                        'field' => 'new_description',
                        'label' => 'descripción',
                        'rules' => 'required|trim|min_length[5]|regex_match[/[a-zA-Z0-9_]+( [a-zA-Z0-9_]+)*$/]',
                        'errors' =>
                        array
                        (
                            'required' => 'Debes ingresar una %s (ej. casa en valparaíso, depto en santiago).',
                            'regex_match' => 'La %s debe contener solo números y letras.',
                            'min_length' => 'La %s tener cómo mínimo 5 dígitos.'
                        )
                ),
                array(
                        'field' => 'new_name',
                        'label' => 'nombre de destinatario',
                        'rules' => 'required|trim|alpha|min_length[3]',
                        'errors' =>
                        array
                        (
                            'required' => 'Debes ingresar un %s.',
                            'alpha' => 'El %s debe contener solo letras.',
                            'min_length' => 'El %s no puede ser tan corto.'
                        )
                ),
                array(
                        'field' => 'new_surname',
                        'label' => 'apellido de destinatario',
                        'rules' => 'required|trim|alpha|min_length[3]',
                        'errors' =>
                        array
                        (
                            'required' => 'Debes ingresar un %s.',
                            'alpha' => 'El %s debe contener solo letras.',
                            'min_length' => 'El %s no puede ser tan corto.'
                        )
                ),
                array(
                        'field' => 'new_address',
                        'label' => 'dirección',
                        'rules' => 'required|trim|min_length[4]|regex_match[/[a-zA-Z0-9_]+( [a-zA-Z0-9_]+)*$/]',
                        'errors' =>
                        array
                        (
                            'required' => 'Debes ingresar una %s.',
                            'regex_match' => 'La %s debe contener solo números y letras.',
                            'min_length' => 'La %s debe contener como mínimo 4 letras.'
                        )
                ),
                array(
                        'field' => 'new_number',
                        'label' => 'número',
                        'rules' => 'required|trim|alpha_numeric|min_length[1]',
                        'errors' =>
                        array
                        (
                            'required' => 'Debes ingresar un %s.',
                            'alpha' => 'El %s puede contener letras y números.',
                            'min_length' => 'El %s debe contener como mínimo 1 número y letras.'
                        )
                ),
                array(
                        'field' => 'new_block',
                        'label' => 'block / oficina',
                        'rules' => 'trim|alpha_numeric|min_length[2]',
                        'errors' =>
                        array
                        (
                            'alpha' => 'El %s puede contener letras y números.',
                            'min_length' => 'El %s debe contener como mínimo 2 números y letras.'
                        )
                ),
                array(
                        'field' => 'new_phone',
                        'label' => 'telefono',
                        'rules' => 'trim|numeric|min_length[6]',
                        'errors' =>
                        array
                        (
                            'alpha' => 'El %s solo puede contener números.',
                            'min_length' => 'El %s debe contener como mínimo 6 números.'
                        )
                )

        )
);



?>
