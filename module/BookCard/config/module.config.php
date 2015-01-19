<?php
return array(
    'router' => array(
        'routes' => array(
            'book-card.rest.book' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/book[/:book_id]',
                    'defaults' => array(
                        'controller' => 'BookCard\\V1\\Rest\\Book\\Controller',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'book-card.rest.book',
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'BookCard\\V1\\Rest\\Book\\BookResource' => 'BookCard\\V1\\Rest\\Book\\BookResourceFactory',
        ),
    ),
    'zf-rest' => array(
        'BookCard\\V1\\Rest\\Book\\Controller' => array(
            'listener' => 'BookCard\\V1\\Rest\\Book\\BookResource',
            'route_name' => 'book-card.rest.book',
            'route_identifier_name' => 'book_id',
            'collection_name' => 'book',
            'entity_http_methods' => array(
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'BookCard\\V1\\Rest\\Book\\BookEntity',
            'collection_class' => 'BookCard\\V1\\Rest\\Book\\BookCollection',
            'service_name' => 'Book',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'BookCard\\V1\\Rest\\Book\\Controller' => 'HalJson',
        ),
        'accept_whitelist' => array(
            'BookCard\\V1\\Rest\\Book\\Controller' => array(
                0 => 'application/vnd.book-card.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
        ),
        'content_type_whitelist' => array(
            'BookCard\\V1\\Rest\\Book\\Controller' => array(
                0 => 'application/vnd.book-card.v1+json',
                1 => 'application/json',
            ),
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'BookCard\\V1\\Rest\\Book\\BookEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'book-card.rest.book',
                'route_identifier_name' => 'book_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'BookCard\\V1\\Rest\\Book\\BookCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'book-card.rest.book',
                'route_identifier_name' => 'book_id',
                'is_collection' => true,
            ),
        ),
    ),
);
