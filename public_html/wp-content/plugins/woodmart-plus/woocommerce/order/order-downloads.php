<?php
/**
 * Order Downloads.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-downloads.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$get_downloads = wplus_helper::get_downloads_files( $downloads );


?>
<div class="white_card">
	<div class="card_header">
		<div class="title">
			<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none"> <path d="M8.25 10.0834V15.5834L10.0833 13.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M8.25033 15.5833L6.41699 13.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M20.1663 9.16671V13.75C20.1663 18.3334 18.333 20.1667 13.7497 20.1667H8.24967C3.66634 20.1667 1.83301 18.3334 1.83301 13.75V8.25004C1.83301 3.66671 3.66634 1.83337 8.24967 1.83337H12.833" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M20.1663 9.16671H16.4997C13.7497 9.16671 12.833 8.25004 12.833 5.50004V1.83337L20.1663 9.16671Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </svg>
		</div>
		<hr>
	</div>
	<div class="download_section__header">
		<?php foreach(wc_get_account_downloads_columns() as $column_id => $column_name  ): ?>
		<div class="head">
				<?php echo esc_html( $column_name ); ?>
		</div>
		<?php endforeach; ?>
	</div>
	<?php foreach ( $get_downloads as  $downloads ):  ?>
			<?php foreach($downloads as $key => $download): ?>
				<div class="accordion_container accordion_download__container">
					<button type="button" class="accordion_button">
						<div class="accordion_button__text">
						<?php echo $key ?>
						</div>
						<div class="accordion_button__text">
						<?php echo is_numeric( $download['downloads_remaining'] ) ? esc_html( $download['downloads_remaining'] ) : esc_html__( '&infin;', 'woocommerce' ); ?>
						</div>
						<div class="accordion_button__text">
						<?php if(!empty($download['access_expires'])):  ?>
							<?php echo '<time datetime="' . esc_attr( date( 'Y-m-d', strtotime( $download['access_expires'] ) ) ) . '" title="' . esc_attr( strtotime( $download['access_expires'] ) ) . '">' . esc_html( date_i18n( get_option( 'date_format' ), strtotime( $download['access_expires'] ) ) ) . '</time>'; ?>
						<?php else: ?>
							<?php echo esc_html_e( 'Never', 'woocommerce' ); ?>
						<?php  endif; ?>
						</div>
						<div class="accordion_button__text">
						<?php echo count($download['file']); ?> دانلود
						</div>
						<div class="accordion_button__icon">
						<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
							<path d="M18.2602 8.2041L12.2836 14.1808C11.5777 14.8866 10.4227 14.8866 9.7169 14.1808L3.74023 8.2041" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
						</svg>
						</div>
					</button>
					<ul class="accordion_download__contents">
						<?php foreach($download['file'] as $k => $file):    ?>
							<li class="accordion_download__content">
								<div class="gap-x">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
									<path d="M7.99967 14.6666C11.6816 14.6666 14.6663 11.6818 14.6663 7.99992C14.6663 4.31802 11.6816 1.33325 7.99967 1.33325C4.31778 1.33325 1.33301 4.31802 1.33301 7.99992C1.33301 11.6818 4.31778 14.6666 7.99967 14.6666Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
									<path d="M10.333 8H6.33301" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
									<path d="M7.66699 6L5.66699 8L7.66699 10" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
									</svg>
									<p><?php echo $file['name']; ?></p>
								</div>
								<a href="<?php echo $file['url']; ?>" class="btn solid small">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none"> <path d="M10.96 5.93335C13.36 6.14002 14.34 7.37335 14.34 10.0733V10.16C14.34 13.14 13.1467 14.3333 10.1667 14.3333H5.82665C2.84665 14.3333 1.65332 13.14 1.65332 10.16V10.0733C1.65332 7.39335 2.61999 6.16002 4.97999 5.94002" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M8 1.33325V9.91992" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M10.2333 8.43335L7.99994 10.6667L5.7666 8.43335" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </svg>
									<p>دانلود</p>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endforeach; ?>
	<?php endforeach;?>
</div>

