# Rapid Custom CSS

![Version](https://img.shields.io/badge/version-1.0.0-blue.svg)
![WordPress](https://img.shields.io/badge/WordPress-5.0+-orange.svg)
![License](https://img.shields.io/badge/license-GPLv2-green.svg)
<a href="https://hits.sh/github.com/sapthesh/Rapid-CSS/"><img alt="Hits" src="https://hits.sh/github.com/sapthesh/Rapid-CSS.svg"/></a>

A lightweight WordPress plugin to securely add custom CSS to your site with a native syntax-highlighting editor.

## 🚀 Overview

Rapid Custom CSS allows site administrators to add custom CSS rules directly from the WordPress dashboard without modifying theme files. It provides a safer, faster alternative to editing `style.css` and ensures your custom styles remain intact even when you switch themes.

## ✨ Features

* **Native Code Editor:** Utilizes WordPress's built-in CodeMirror library (`wp_enqueue_code_editor`) for syntax highlighting, bracket matching, and line numbers.
* **Highly Secure:** Implements strict data sanitization (`wp_strip_all_tags`) on both save and output (Late Escaping) to prevent XSS attacks.
* **Lightweight:** The editor assets only load on the specific plugin settings page, ensuring zero performance impact on your WordPress admin dashboard.
* **High Priority Output:** Custom styles are injected into the `<head>` of your website with a priority of 99, ensuring they override default theme styles.

## 🛠️ Installation

### Manual Installation
1. Download the latest release `.zip` file.
2. Go to your WordPress Dashboard -> **Plugins** -> **Add New** -> **Upload Plugin**.
3. Upload the `.zip` file and click **Install Now**.
4. Click **Activate**.

### Git Installation
1. Navigate to your WordPress plugins directory: `cd wp-content/plugins/`
2. Clone this repository: `git clone https://github.com/yourusername/rapid-custom-css.git`
3. Activate the plugin through the WordPress admin interface.

## 💻 Usage

1. Navigate to **Appearance** -> **Rapid CSS** in your WordPress dashboard.
2. Write your custom CSS in the editor.
3. Click **Save CSS**.
4. The styles will immediately be applied to the frontend of your website.

## 🛡️ Security Details

This plugin was built with strict WordPress security standards in mind:
* Requires `manage_options` capability (Admin only).
* Uses the WordPress Settings API, which automatically handles nonce verification to protect against CSRF attacks.
* CSS output is heavily sanitized to strip HTML and script tags, allowing only valid CSS to be rendered.

## 👨‍💻 Author

**Sapthesh V**

## 📄 License

This project is licensed under the GPLv2 (or later) License - see the [LICENSE](http://www.gnu.org/licenses/gpl-2.0.html) details.
