<?php
function front_narshindi_function() {
  ob_start();
?>
<div class="col-md-12">
    <table class="table table-bordered table-dark table-hovered">
        <thead>
            <tr>
                <th>সনাক্ত</th>
                <th>রিকোভারি</th>
                <th>মৃত্যু</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo get_option('wp_violet_narshindi_active'); ?></td>
                <td><?php echo get_option('wp_violet_narshindi_recovered'); ?></td>
                <td><?php echo get_option('wp_violet_narshindi_fatal'); ?></td>
            </tr>
        </tbody>
    </table>
</div>

<?php
return ob_get_clean();
}
add_shortcode('POLASH_NARSHINDI', 'front_narshindi_function');