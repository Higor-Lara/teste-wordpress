<?php
/**
 * Redirect 404
 * 
 * Plugin Name: Redirect 404
 */
 
if (! defined( 'ABSPATH')) {
    exit;
}

 class Redirect {
     public function __construct() {
        add_action('template_redirect', array($this, 'handle_redirect')); 
        add_action('admin_menu', array($this, 'adicionar_menu'));

        // Acessa o Banco de Dados
        global $wpdb;

        // Define o nome da tabela
        $redirect_errors_wpdb = $wpdb->prefix . "redirect_errors_wpdb";

        // Importa um arquivo caso não tenha sido incluido. 
        // ABSPATH é uma constante que tem o caminho raiz da instalação
        // 'wp-admin/includes/upgrade.php' é o caminho do arquivo que possui a função dbDelta()
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

        // Aqui é definido a estrutura da tabela.
        $sql = "CREATE TABLE IF NOT EXISTS $redirect_errors_wpdb (
            url VARCHAR(255) NOT NULL PRIMARY KEY,
            count BIGINT(20) UNSIGNED NOT NULL DEFAULT 0
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
        // Executa a criação da tabela 
        dbDelta($sql);

        if (!get_option('redirect_errors')) {
            add_option('redirect_errors', 0);
        }
    }

    public function handle_redirect() {
        if(is_404()) {
            $url_erro = home_url($_SERVER['REQUEST_URI']);

            global $wpdb;
            $redirect_errors_wpdb = $wpdb->prefix . "redirect_errors_wpdb";

            $count_atual = $wpdb->get_var($wpdb->prepare("SELECT count FROM $redirect_errors_wpdb WHERE url = %s", $url_erro));

            if($count_atual !== null) {
                $wpdb->update(
                    $redirect_errors_wpdb,
                    array('count' => $count_atual + 1), // Novos valores
                    array('url' => $url_erro), // Condição
                    array('%d'), // Tipo do novo valor
                    array('%s')  // Tipo da condição
                );
            } else {
                $wpdb->insert(
                    $redirect_errors_wpdb,
                    array(
                        'url' => $url_erro,
                        'count' => 1,
                    ),
                    array('%s', '%d')
                );
            }

            $redirect_errors = get_option('redirect_errors', 0);
            update_option('redirect_errors', $redirect_errors + 1);
            wp_safe_redirect( home_url( '/exemplo' ) );
            exit;
        }
    }

    public function adicionar_menu() {
        add_menu_page(
            'Contagem de redirecionamentos', 
            'Redirect 404', 
            'manage_options', 
            'redirect_404_settings', 
            array($this, 'pagina_configuracoes'), 
            'dashicons-admin-generic', 
            20
        );
    }

    public function pagina_configuracoes() {
        global $wpdb;
        $redirect_errors_wpdb = $wpdb->prefix . "redirect_errors_wpdb";
        $data = $wpdb->get_results("SELECT * FROM $redirect_errors_wpdb", ARRAY_A);

        if (!current_user_can('manage_options')) {
            return;
        }

        $redirect_errors = get_option('redirect_errors', 0);

        ?>
        <div class="wrap">
        <h1>Contagem de Redirect 404</h1>
        <p>Número total de redirecionamentos 404: <strong><?php echo esc_html($redirect_errors); ?></strong></p>

        <table class="wp-list-table widefat fixed striped">
            <thead>
                <tr>
                    <th>URL</th>
                    <th>Quantidade de Erros</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    if (!empty($data)) {
                        foreach ($data as $row) {
                            echo "<tr><td>{$row['url']}</td><td>{$row['count']}</td></tr>";
                        }
                    } else {
                        echo "<tr><td colspan='2'>Nenhum erro registrado ainda.</td></tr>";
                    }
                ?>
            </tbody>
        </table>
        </div>
        <?php
    }

    public function activate() {
        add_option('redirect_errors', 0);
    }
    public function deactivate() {
        delete_option('redirect_errors');
    }
 }
 
 $redirect = new Redirect();

 // activation 
 register_activation_hook(__FILE__, array($redirect, 'activate'));

 //deactivation
 register_deactivation_hook(__FILE__, array($redirect, 'deactivate'));