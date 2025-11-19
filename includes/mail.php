<?php

function handle_form_submission() {
    
    $email = carbon_get_theme_option('site-email');
    
    $name  = sanitize_text_field($_POST['callback_name'] ?? $_POST['cart_name'] ?? '');
    $phone = sanitize_text_field($_POST['callback_phone'] ?? $_POST['cart_phone'] ?? '');


    $to = $email; 
    $subject = 'Новая заявка с сайта';
    $headers = array('Content-Type: text/html; charset=UTF-8');

    $message = "<h2>Новая заявка</h2>";
    $message .= "<p><strong>Имя:</strong> $name</p>";
    $message .= "<p><strong>Телефон:</strong> $phone</p>";

    if (isset($_POST['cart_items']) && isset($_POST['cart_total'])) {
        $cart_total = sanitize_text_field($_POST['cart_total']);
        $cart_items_count = isset($_POST['cart_items_count']) ? sanitize_text_field($_POST['cart_items_count']) : 0;
        $cart_items = json_decode(stripslashes($_POST['cart_items']), true);
        
        $subject = 'Новый заказ с сайта';
        
        $message .= "<hr>";
        $message .= "<h3>Информация о заказе</h3>";
        $message .= "<p><strong>Общее количество товаров:</strong> $cart_items_count</p>";
        $message .= "<p><strong>Общая сумма с учетом скидки:</strong> $cart_total ₽</p>";
        if (!empty($_POST['applied_discount'])) {
            $applied_discount = sanitize_text_field($_POST['applied_discount']);
            $message .= "<p><strong>Скидка применена:</strong> {$applied_discount}%</p>";
        }
        
        if (is_array($cart_items) && !empty($cart_items)) {
            $message .= "<h4>Состав заказа:</h4>";
            $message .= "<table border='1' cellpadding='8' style='border-collapse: collapse; width: 100%;'>";
            $message .= "<tr style='background-color: #f8f9fa;'>";
            $message .= "<th>Товар</th>";
            $message .= "<th>Артикул</th>";
            $message .= "<th>Цена</th>";
            $message .= "<th>Кол-во</th>";
            $message .= "<th>Сумма</th>";
            $message .= "</tr>";
            
            $total_sum = 0;
            foreach ($cart_items as $item) {
                $item_title = sanitize_text_field($item['title']);
                $item_sku = sanitize_text_field($item['sku']);
                $item_price = floatval($item['price']);
                $item_quantity = intval($item['quantity']);
                $item_total = floatval($item['total']);
                
                $total_sum += $item_total;
                
                $message .= "<tr>";
                $message .= "<td>$item_title</td>";
                $message .= "<td>$item_sku</td>";
                $message .= "<td>$item_price ₽</td>";
                $message .= "<td>$item_quantity</td>";
                $message .= "<td>$item_total ₽</td>";
                $message .= "</tr>";
            }
            
            $message .= "<tr style='background-color: #f8f9fa; font-weight: bold;'>";
            $message .= "<td colspan='4' style='text-align: right;'>Итого:</td>";
            $message .= "<td>$total_sum ₽</td>";
            $message .= "</tr>";
            $message .= "</table>";
        }
    }
    

    $message .= "<hr>";
    $message .= "<p><small>Заявка отправлена: " . current_time('d.m.Y H:i') . "</small></p>";

    if (wp_mail($to, $subject, $message, $headers)) {

        if (isset($_POST['cart_items']) && class_exists('WC_Cart')) {

            WC()->cart->empty_cart();
        }
        
        wp_send_json(['status' => 'success', 'message' => 'Заявка успешно отправлена!']);
    } else {
        wp_send_json(['status' => 'error', 'message' => 'Ошибка отправки письма']);
    }

}

add_action('wp_ajax_submit_form', 'handle_form_submission');        
add_action('wp_ajax_nopriv_submit_form', 'handle_form_submission');