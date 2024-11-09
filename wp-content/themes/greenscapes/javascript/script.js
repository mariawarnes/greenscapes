/**
 * Front-end JavaScript
 *
 * The JavaScript code you place here will be processed by esbuild. The output
 * file will be created at `../theme/js/script.min.js` and enqueued in
 * `../theme/functions.php`.
 *
 * For esbuild documentation, please see:
 * https://esbuild.github.io/
 */

document.addEventListener('DOMContentLoaded', function () {
	// Desktop: Toggle dropdowns on click for menu items with children
	const desktopDropdowns = document.querySelectorAll(
		'.menu-item-has-children > a'
	);
	desktopDropdowns.forEach((link) => {
		link.addEventListener('click', (e) => {
			e.preventDefault();
			const submenu = link.nextElementSibling;
			if (submenu) {
				// Toggle display between 'block' and 'none'
				submenu.style.display =
					window.getComputedStyle(submenu).display === 'none'
						? 'block'
						: 'none';
			}
		});
	});

	// Mobile: Toggle mobile menu
	const menuBtn = document.querySelector('#menu-toggle');
	const mobileDropdown = document.querySelector('#nav_mobile');

	menuBtn.addEventListener('click', (e) => {
		e.preventDefault();
		if (mobileDropdown) {
			// Toggle display between 'flex' and 'none'
			mobileDropdown.style.display =
				window.getComputedStyle(mobileDropdown).display === 'none'
					? 'flex'
					: 'none';
		}
	});

	// Window resize event to reset mobile menu display
	window.addEventListener('resize', () => {
		if (window.innerWidth >= 768 && mobileDropdown) {
			// Adjust 768 as your desktop breakpoint
			// Hide mobile dropdown on larger screens
			mobileDropdown.style.display = 'none';
		}
	});
});
