# Static Website with Registration and Email Functionality

![image](https://github.com/user-attachments/assets/0870754f-d4bc-425a-87b4-12cf54f8c8c0)


This repository contains a static website built using HTML and PHP. The website allows users to register by submitting their details through a form. Upon successful registration, the following actions occur:

- The admin receives an email with the registration details.
- The registrant receives a thank-you email.

---

## Features
- **Registration Form**: Users can submit their name, email, and phone number.
- **Email Notifications**: Emails are sent to both the registrant and the admin.
- **Thank You Page**: Users are redirected to a thank-you page upon successful submission.

---

## Prerequisites

### Server Requirements
- Ubuntu server with the LAMP stack installed (Linux, Apache, MySQL, PHP).

### Email Configuration
- Postfix is configured for sending emails using an SMTP server (e.g., Gmail).

---

## Installation Instructions

### 1. **Set Up the Environment**
1. Install the required packages on your Ubuntu server:
   ```bash
   sudo apt update
   sudo apt install apache2 php libapache2-mod-php postfix
   ```

2. Configure Postfix for SMTP:
   - Edit the Postfix configuration file:
     ```bash
     sudo nano /etc/postfix/main.cf
     ```
   - Add the following lines:
     ```text
     relayhost = [smtp.gmail.com]:587
     smtp_use_tls = yes
     smtp_sasl_auth_enable = yes
     smtp_sasl_password_maps = hash:/etc/postfix/sasl_passwd
     smtp_sasl_security_options = noanonymous
     smtp_tls_CAfile = /etc/ssl/certs/ca-certificates.crt
     ```
   - Create the `/etc/postfix/sasl_passwd` file with your email credentials:
     ```text
     [smtp.gmail.com]:587 your_email@gmail.com:your_app_password
     ```
   - Secure the file and reload Postfix:
     ```bash
     sudo chmod 600 /etc/postfix/sasl_passwd
     sudo postmap /etc/postfix/sasl_passwd
     sudo systemctl restart postfix
     ```

### 2. **Deploy the Website**
1. Copy the website files to the Apache root directory:
   ```bash
   sudo cp index.html /var/www/html/
   sudo cp thank_you.html /var/www/html/
   sudo cp register.php /var/www/html/
   ```

2. Set appropriate permissions:
   ```bash
   sudo chown www-data:www-data /var/www/html/* -R
   sudo chmod 755 /var/www/html/* -R
   ```

---

## Testing
1. Open a browser and navigate to your server's IP or domain.
2. Fill out the registration form.
3. Verify that:
   - The admin receives an email with the registration details.
   - The registrant receives a thank-you email.
   - The thank-you page is displayed after submission.

---

## File Structure
- `index.html`: Main page containing the registration form.
- `register.php`: Handles form submissions and sends emails.
- `thank_you.html`: Thank-you page displayed after successful registration.

---

## License
This project is licensed under the MIT License. Feel free to use, modify, and distribute it as needed.
