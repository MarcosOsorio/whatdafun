/* ci_sessions table script */

drop table if exists ci_sessions;

create table ci_sessions (
        id varchar(128) not null,
        ip_address varchar(45) not null,
        timestamp int(10) unsigned default 0 not null,
        data blob not null,
        KEY ci_sessions_timestamp (timestamp),
        primary key (id)
);

/* Region and Commune insert script */

insert into region
values
(NULL, "Arica y Parinacota"),
(NULL, "Tarapacá"),
(NULL, "Antofagasta"),
(NULL, "Atacama"),
(NULL, "Coquimbo"),
(NULL, "Valparaíso"),
(NULL, "Libertador Gral. Bernardo O'Higgins"),
(NULL, "Maule"),
(NULL, "Bíobío"),
(NULL, "Araucanía"),
(NULL, "Los Ríos"),
(NULL, "Los Lagos"),
(NULL, "Aisén Gral. Carlos Ibáñez del Campo"),
(NULL, "Magallanes y Antártica Chilena"),
(NULL, "Metropolitana de Santiago");

insert into commune
values
(null, 1, "Arica"),
(null, 1, "Camarones"),
(null, 1, "Putre"),
(null, 1, "General Lagos"),
(NULL, 2, "Iquique"),
(NULL, 2, "Alto Hospicio"),
(NULL, 2, "Pozo Almonte"),
(NULL, 2, "Camiña"),
(NULL, 2, "Colchane"),
(NULL, 2, "Huara"),
(NULL, 2, "Pica"),
(NULL, 3, "Antofagasta"),
(NULL, 3, "Mejillones"),
(NULL, 3, "Sierra Gorda"),
(NULL, 3, "Taltal"),
(NULL, 3, "Calama"),
(NULL, 3, "Ollagüe"),
(NULL, 3, "San Pedro de Atacama"),
(NULL, 3, "Tocopilla"),
(NULL, 3, "María Elena"),
(NULL, 4, "Copiapó"),
(NULL, 4, "Caldera"),
(NULL, 4, "Tierra Amarilla"),
(NULL, 4, "Chañaral"),
(NULL, 4, "Diego de Almagro"),
(NULL, 4, "Vallenar"),
(NULL, 4, "Alto del Carmen"),
(NULL, 4, "Freirina"),
(NULL, 4, "Huasco"),
(NULL, 5, "La Serena"),
(NULL, 5, "Coquimbo"),
(NULL, 5, "Andacollo"),
(NULL, 5, "La Higuera"),
(NULL, 5, "Paiguano"),
(NULL, 5, "Vicuña"),
(NULL, 5, "Illapel"),
(NULL, 5, "Canela"),
(NULL, 5, "Los Vilos"),
(NULL, 5, "Salamanca"),
(NULL, 5, "Ovalle"),
(NULL, 5, "Combarbalá"),
(NULL, 5, "Monte Patria"),
(NULL, 5, "Punitaqui"),
(NULL, 5, "Río Hurtado"),
(NULL, 6, "Valparaíso"),
(NULL, 6, "Casablanca"),
(NULL, 6, "Concón"),
(NULL, 6, "Juan Fernández"),
(NULL, 6, "Puchuncaví"),
(NULL, 6, "Quintero"),
(NULL, 6, "Viña del Mar"),
(NULL, 6, "Isla de Pascua"),
(NULL, 6, "Los Andes"),
(NULL, 6, "Calle Larga"),
(NULL, 6, "Rinconada"),
(NULL, 6, "San Esteban"),
(NULL, 6, "La Ligua"),
(NULL, 6, "Cabildo"),
(NULL, 6, "Papudo"),
(NULL, 6, "Petorca"),
(NULL, 6, "Zapallar"),
(NULL, 6, "Quillota"),
(NULL, 6, "Calera"),
(NULL, 6, "Hijuelas"),
(NULL, 6, "La Cruz"),
(NULL, 6, "Nogales"),
(NULL, 6, "San Antonio"),
(NULL, 6, "Algarrobo"),
(NULL, 6, "Cartagena"),
(NULL, 6, "El Quisco"),
(NULL, 6, "El Tabo"),
(NULL, 6, "San Felipe"),
(NULL, 6, "Catemu"),
(NULL, 6, "Llaillay"),
(NULL, 6, "Panquehue"),
(NULL, 6, "Putaendo"),
(NULL, 6, "Santa María"),
(NULL, 6, "Limache"),
(NULL, 6, "Quilpué"),
(NULL, 6, "Villa Alemana"),
(NULL, 6, "Olmué"),
(NULL, 7, "Rancagua"),
(NULL, 7, "Codegua"),
(NULL, 7, "Coinco"),
(NULL, 7, "Coltauco"),
(NULL, 7, "Doñihue"),
(NULL, 7, "Graneros"),
(NULL, 7, "Las Cabras"),
(NULL, 7, "Machalí"),
(NULL, 7, "Malloa"),
(NULL, 7, "Mostazal"),
(NULL, 7, "Olivar"),
(NULL, 7, "Peumo"),
(NULL, 7, "Pichidegua"),
(NULL, 7, "Quinta de Tilcoco"),
(NULL, 7, "Rengo"),
(NULL, 7, "Requínoa"),
(NULL, 7, "San Vicente"),
(NULL, 7, "Pichilemu"),
(NULL, 7, "La Estrella"),
(NULL, 7, "Litueche"),
(NULL, 7, "Marchihue"),
(NULL, 7, "Navidad"),
(NULL, 7, "Paredones"),
(NULL, 7, "San Fernando"),
(NULL, 7, "Chépica"),
(NULL, 7, "Chimbarongo"),
(NULL, 7, "Lolol"),
(NULL, 7, "Nancagua"),
(NULL, 7, "Palmilla"),
(NULL, 7, "Peralillo"),
(NULL, 7, "Placilla"),
(NULL, 7, "Pumanque"),
(NULL, 7, "Santa Cruz"),
(NULL, 8, "Talca"),
(NULL, 8, "Constitución"),
(NULL, 8, "Curepto"),
(NULL, 8, "Empedrado"),
(NULL, 8, "Maule"),
(NULL, 8, "Pelarco"),
(NULL, 8, "Pencahue"),
(NULL, 8, "Río Claro"),
(NULL, 8, "San Clemente"),
(NULL, 8, "San Rafael"),
(NULL, 8, "Cauquenes"),
(NULL, 8, "Chanco"),
(NULL, 8, "Pelluhue"),
(NULL, 8, "Curicó"),
(NULL, 8, "Hualañé"),
(NULL, 8, "Licantén"),
(NULL, 8, "Molina"),
(NULL, 8, "Rauco"),
(NULL, 8, "Romeral"),
(NULL, 8, "Sagrada Familia"),
(NULL, 8, "Teno"),
(NULL, 8, "Vichuquén"),
(NULL, 8, "Linares"),
(NULL, 8, "Colbún"),
(NULL, 8, "Longaví"),
(NULL, 8, "Parral"),
(NULL, 8, "Retiro"),
(NULL, 8, "San Javier"),
(NULL, 8, "Villa Alegre"),
(NULL, 8, "Yerbas Buenas"),
(NULL, 9, "Concepción"),
(NULL, 9, "Coronel"),
(NULL, 9, "Chiguayante"),
(NULL, 9, "Florida"),
(NULL, 9, "Hualqui"),
(NULL, 9, "Lota"),
(NULL, 9, "Penco"),
(NULL, 9, "San Pedro de la Paz"),
(NULL, 9, "Santa Juana"),
(NULL, 9, "Talcahuano"),
(NULL, 9, "Tomé"),
(NULL, 9, "Hualpén"),
(NULL, 9, "Lebu"),
(NULL, 9, "Arauco"),
(NULL, 9, "Cañete"),
(NULL, 9, "Contulmo"),
(NULL, 9, "Curanilahue"),
(NULL, 9, "Los Alamos"),
(NULL, 9, "Tirúa"),
(NULL, 9, "Los Angeles"),
(NULL, 9, "Antuco"),
(NULL, 9, "Cabrero"),
(NULL, 9, "Laja"),
(NULL, 9, "Mulchén"),
(NULL, 9, "Nacimiento"),
(NULL, 9, "Negrete"),
(NULL, 9, "Quilaco"),
(NULL, 9, "Quilleco"),
(NULL, 9, "San Rosendo"),
(NULL, 9, "Santa Bárbara"),
(NULL, 9, "Tucapel"),
(NULL, 9, "Yumbel"),
(NULL, 9, "Alto Biobío"),
(NULL, 9, "hillán"),
(NULL, 9, "Bulnes"),
(NULL, 9, "Cobquecura"),
(NULL, 9, "Coelemu"),
(NULL, 9, "Coihueco"),
(NULL, 9, "Chillán Viejo"),
(NULL, 9, "El Carmen"),
(NULL, 9, "Ninhue"),
(NULL, 9, "Ñiquén"),
(NULL, 9, "Pemuco"),
(NULL, 9, "Pinto"),
(NULL, 9, "Portezuelo"),
(NULL, 9, "Quillón"),
(NULL, 9, "Quirihue"),
(NULL, 9, "Ránquil"),
(NULL, 9, "San Carlos"),
(NULL, 9, "San Fabián"),
(NULL, 9, "San Ignacio"),
(NULL, 9, "San Nicolás"),
(NULL, 9, "Treguaco"),
(NULL, 9, "Yungay"),
(NULL, 10, "Temuco"),
(NULL, 10, "Carahue"),
(NULL, 10, "Cunco"),
(NULL, 10, "Curarrehue"),
(NULL, 10, "Freire"),
(NULL, 10, "Galvarino"),
(NULL, 10, "Gorbea"),
(NULL, 10, "Lautaro"),
(NULL, 10, "Loncoche"),
(NULL, 10, "Melipeuco"),
(NULL, 10, "Nueva Imperial"),
(NULL, 10, "Padre Las Casas"),
(NULL, 10, "Perquenco"),
(NULL, 10, "Pitrufquén"),
(NULL, 10, "Pucón"),
(NULL, 10, "Saavedra"),
(NULL, 10, "Teodoro Schmidt"),
(NULL, 10, "Toltén"),
(NULL, 10, "Vilcún"),
(NULL, 10, "Villarrica"),
(NULL, 10, "Cholchol"),
(NULL, 10, "Angol"),
(NULL, 10, "Collipulli"),
(NULL, 10, "Curacautín"),
(NULL, 10, "Ercilla"),
(NULL, 10, "Lonquimay"),
(NULL, 10, "Los Sauces"),
(NULL, 10, "Lumaco"),
(NULL, 10, "Purén"),
(NULL, 10, "Renaico"),
(NULL, 10, "Traiguén"),
(NULL, 10, "Victoria"),
(NULL, 11, "Valdivia"),
(NULL, 11, "Corral"),
(NULL, 11, "Lanco"),
(NULL, 11, "Los Lagos"),
(NULL, 11, "Máfil"),
(NULL, 11, "Mariquina"),
(NULL, 11, "Paillaco"),
(NULL, 11, "Panguipulli"),
(NULL, 11, "La Unión"),
(NULL, 11, "Futrono"),
(NULL, 11, "Lago Ranco"),
(NULL, 11, "Río Bueno"),
(NULL, 12, "Puerto Montt"),
(NULL, 12, "Calbuco"),
(NULL, 12, "Cochamó"),
(NULL, 12, "Fresia"),
(NULL, 12, "Frutillar"),
(NULL, 12, "Los Muermos"),
(NULL, 12, "Llanquihue"),
(NULL, 12, "Maullín"),
(NULL, 12, "Puerto Varas"),
(NULL, 12, "Castro"),
(NULL, 12, "Ancud"),
(NULL, 12, "Chonchi"),
(NULL, 12, "Curaco de Vélez"),
(NULL, 12, "Dalcahue"),
(NULL, 12, "Puqueldón"),
(NULL, 12, "Queilén"),
(NULL, 12, "Quellón"),
(NULL, 12, "Quemchi"),
(NULL, 12, "Quinchao"),
(NULL, 12, "Osorno"),
(NULL, 12, "Puerto Octay"),
(NULL, 12, "Purranque"),
(NULL, 12, "Puyehue"),
(NULL, 12, "Río Negro"),
(NULL, 12, "San Juan de la Costa"),
(NULL, 12, "San Pablo"),
(NULL, 12, "Chaitén"),
(NULL, 12, "Futaleufú"),
(NULL, 12, "Hualaihué"),
(NULL, 12, "Palena"),
(NULL, 13, "Coyhaique"),
(NULL, 13, "Lago Verde"),
(NULL, 13, "Aisén"),
(NULL, 13, "Cisnes"),
(NULL, 13, "Guaitecas"),
(NULL, 13, "Cochrane"),
(NULL, 13, "O'Higgins"),
(NULL, 13, "Tortel"),
(NULL, 13, "Chile Chico"),
(NULL, 13, "Río Ibáñez"),
(NULL, 14, "Punta Arenas"),
(NULL, 14, "Laguna Blanca"),
(NULL, 14, "Río Verde"),
(NULL, 14, "San Gregorio"),
(NULL, 14, "Cabo de Hornos (Ex-Navarino)"),
(NULL, 14, "Antártica"),
(NULL, 14, "Porvenir"),
(NULL, 14, "Primavera"),
(NULL, 14, "Timaukel"),
(NULL, 14, "Natales"),
(NULL, 14, "Torres del Paine"),
(NULL, 15, "Santiago"),
(NULL, 15, "Cerrillos"),
(NULL, 15, "Cerro Navia"),
(NULL, 15, "Conchalí"),
(NULL, 15, "El Bosque"),
(NULL, 15, "Estación Central"),
(NULL, 15, "Huechuraba"),
(NULL, 15, "Independencia"),
(NULL, 15, "La Cisterna"),
(NULL, 15, "La Florida"),
(NULL, 15, "La Granja"),
(NULL, 15, "La Pintana"),
(NULL, 15, "La Reina"),
(NULL, 15, "Las Condes"),
(NULL, 15, "Lo Barnechea"),
(NULL, 15, "Lo Espejo"),
(NULL, 15, "Lo Prado"),
(NULL, 15, "Macul"),
(NULL, 15, "Maipú"),
(NULL, 15, "Ñuñoa"),
(NULL, 15, "Pedro Aguirre Cerda"),
(NULL, 15, "Peñalolén"),
(NULL, 15, "Providencia"),
(NULL, 15, "Pudahuel"),
(NULL, 15, "Quilicura"),
(NULL, 15, "Quinta Normal"),
(NULL, 15, "Recoleta"),
(NULL, 15, "Renca"),
(NULL, 15, "San Joaquín"),
(NULL, 15, "San Miguel"),
(NULL, 15, "San Ramón"),
(NULL, 15, "Vitacura"),
(NULL, 15, "Puente Alto"),
(NULL, 15, "Pirque"),
(NULL, 15, "San José de Maipo"),
(NULL, 15, "Colina"),
(NULL, 15, "Lampa"),
(NULL, 15, "Tiltil"),
(NULL, 15, "San Bernardo"),
(NULL, 15, "Buin"),
(NULL, 15, "Calera de Tango"),
(NULL, 15, "Paine"),
(NULL, 15, "Melipilla"),
(NULL, 15, "Alhué"),
(NULL, 15, "Curacaví"),
(NULL, 15, "María Pinto"),
(NULL, 15, "San Pedro"),
(NULL, 15, "Talagante"),
(NULL, 15, "El Monte"),
(NULL, 15, "Isla de Maipo"),
(NULL, 15, "Padre Hurtado"),
(NULL, 15, "Peñaflor");

insert into address
values
(null, 1, 12 , 'casa en la playa', 'marcos', 'osorio', 'rio la playa', null, 789, '57105564', 'marcos@gmail.com', 1 ),
(null, 1, 14 , 'casa en el norte', 'marcos', 'osorio', 'rio la playa', null, 789, '1123233312', 'marcos@gmail.com', 0 ),
(null, 1,  20, 'casa en requinoa', 'marcos', 'osorio', 'rio la playa', null, 789, '4564566', 'marcos@gmail.com', 0 ),
(null, 1, 200 , 'casa en el monte', 'marcos', 'osorio', 'rio la playa', null, 789, '78989889', 'marcos@gmail.com', 0 ),
(null, 1, 320, 'casa en san diego', 'marcos', 'osorio', 'rio la playa', null, 789, '5455654', 'marcos@gmail.com', 0 ),
(null, 2, 12 , 'casa en la playa', 'marcos', 'osorio', 'rio la playa', null, 789, '57105564', 'marcos@gmail.com', 1 ),
(null, 2, 14 , 'casa en el norte', 'marcos', 'osorio', 'rio la playa', null, 789, '1123233312', 'marcos@gmail.com', 0 ),
(null, 2,  20, 'casa en requinoa', 'marcos', 'osorio', 'rio la playa', null, 789, '4564566', 'marcos@gmail.com', 0 ),
(null, 2, 200 , 'casa en el monte', 'marcos', 'osorio', 'rio la playa', null, 789, '78989889', 'marcos@gmail.com', 0 ),
(null, 2, 320, 'casa en san diego', 'marcos', 'osorio', 'rio la playa', null, 789, '5455654', 'marcos@gmail.com', 0 );

insert into gallery
values
(null, 1, 'cerati', null),
(null, 1, 'pokemon', null),
(null, 1, 'educación', null),
(null, 1, 'digimon', null),
(null, 2, 'comida', null),
(null, 2, 'shinshan', null),
(null, 2, 'dragonball', null),
(null, 2, 'supercampeones', null),
(null, 2, 'ash ketchum', null);


insert into design
values
(null, 1, 'gracias totales', null, 'assets/img/item/1b.jpg'),
(null, 1, 'zeta bosio', null, null),
(null, 1, 'cecilia amenabar', null, null),
(null, 1, 'gracias totales', null, null),
(null, 1, 'zeta bosio', null, null),
(null, 1, 'cecilia amenabar', null, null),
(null, 1, 'gracias totales', null, null),
(null, 1, 'zeta bosio', null, null),
(null, 1, 'cecilia amenabar', null, null),
(null, 1, 'gracias totales', null, null),
(null, 1, 'zeta bosio', null, null),
(null, 1, 'cecilia amenabar', null, null),
(null, 1, 'gracias totales', null, null),
(null, 1, 'zeta bosio', null, null),
(null, 1, 'cecilia amenabar', null, null),
(null, 2, 'gracias totales', null, null),
(null, 3, 'zeta bosio', null, null),
(null, 4, 'cecilia amenabar', null, null);
