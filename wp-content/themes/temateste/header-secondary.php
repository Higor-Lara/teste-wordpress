<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testado</title>
    
    
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header>
        <nav>
            <?php 
                wp_nav_menu(array(
                    'theme_location' => 'my_secondary_menu',
                    'menu_class' => 'secondary-menu'
                ));
            ?>
        </nav>
    </header>

