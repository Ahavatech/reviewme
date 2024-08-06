# ReviewMe

ReviewMe is a simple and secure platform that allows brands to collect and showcase reviews from their clients. Each brand can generate a unique link to send to clients, where they can submit reviews anonymously or with their name. Brands can also share a public review board link to display all received reviews to prospective customers.

## Features

- **User Registration:** Brands can register and create an account.
- **Login/Logout:** Secure login and logout functionality.
- **Unique Review Links:** Each brand can generate a unique link for clients to submit reviews.
- **Anonymous Reviews:** Clients can choose to leave their name or submit reviews anonymously.
- **Review Board:** Brands can view all received reviews on a dedicated review board.
- **Responsive Design:** User-friendly interface that works on all devices.

## Usage

1. **Register:** Create a brand account using the registration form.
2. **Login:** Access your account with your credentials.
3. **Generate Links:** Use the link generation feature to create your unique review submission and review board links.
4. **Share Links:** Share your review submission link with clients and the review board link with prospective customers.

## Security

- Passwords are hashed using PHP's `password_hash()` function.
- CSRF protection is implemented using tokens to prevent unauthorized form submissions.
- User sessions are securely managed with session regeneration upon login.

## Contributing

If you'd like to contribute to this project, please fork the repository and submit a pull request. We welcome all improvements, from bug fixes to new features.

## License

This project is licensed under the MIT License. See the `LICENSE` file for details.

## Contact

For any questions or feedback, feel free to reach out at [ahavatechng@gmail.com].
