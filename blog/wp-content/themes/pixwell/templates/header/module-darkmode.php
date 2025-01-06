<?php
if ( '1' === (string) pixwell_get_option( 'dark_mode' ) ) { ?>
    <aside class="header-dark-mode">
        <span class="dark-mode-toggle">
            <span class="mode-icons">
                <span class="dark-mode-icon mode-icon-dark"><i class="rbi rbi-moon"></i></span>
                <span class="dark-mode-icon mode-icon-default"><i class="rbi rbi-sun"></i></span>
            </span>
        </span>
    </aside>
	<?php
}