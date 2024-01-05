<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Terminology

<b>App or Application</b> refers to this website.
<b>Members</b> refers to a person who registers on this app as a customer.
<b>Admin</b> refers to a person who is registered to manage members.
<b>Super Admin</b> refers to an admin who has maximum control and can manage other admins.

## Admin

There are five admin levels in the app, Level 0 to level 4. Level 0 is reserved for normal users that are members. This level is set automatically when the user registers. Level 4 is for a super admin and, at this stage, it can only be set manually on the database. All other admins are given level 1 to 3. When a Super admin adds an admin they are automatically set to level 1. At this point of app development, we use only level 0, 1 and 4. Levels 2 and 3 are reserved for possible future need.

<b>Adding the 1st Admin</b>
The 1st admin should be a super admin so he can add other admins. A super admin can only be added by manually manipulating the users table in the database. Follow these procedures to add the very 1st admin.

1.	The admin-to-be must first register as a member on https://www.dhs.org.za/register. And set a password.
2.	Log into the host’s control panel to access the app database.
3.	On the users table change the admin_level field of the new admin to 4.
4.	Adding the super admin’s details on the admins table:
a.	id :Auto incremented primary key
b.	user_id : should have the same value as the id field of the users table of this new admin.
c.	level: should have a value of 4.
d.	status: field should have a string value of “active”
# e. Done
5.	Delete the super admin from the members table and mics table.

## Database Tables of note

<b>Permissions table</b>
The recommended way to populate this table is to use a database seeder. Use php artisan db:seed to seed this table. db:seed reads columns from other tables in order to populate the permissions table. Make sure that these tables are present in the database before running db:seed: areas, beneficiaries, documents, home_addresses, members, miscs, next_of_kin, post_addresses, subscriptions.

However, although cumbersome, entries may also be inserted manually using this guide:

•	<b>id</b>: Auto incremented primary key.
•	<b>type</b>: These are permission types, e.g. write permission or read permission. Write permissions should be entered as “write” and read permissions as “read”. These values are used later within the code, so it is important to enter exactly as stated.
•	<b>entity:</b> This is the name of the table for which the permission applies to. The entity is used later in the code and so this entry should be written exactly as the table name.
•	<b>attribute:</b> This is the name of the field for which the permission applies to. The attribute names should be written exactly as the names of the fields the refer to.
•	<b>created_at, updated_at:</b> These fields are not used. They are needed by the Laravel framework.



Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[British Software Development](https://www.britishsoftware.co)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- [UserInsights](https://userinsights.com)
- [Fragrantica](https://www.fragrantica.com)
- [SOFTonSOFA](https://softonsofa.com/)
- [User10](https://user10.com)
- [Soumettre.fr](https://soumettre.fr/)
- [CodeBrisk](https://codebrisk.com)
- [1Forge](https://1forge.com)
- [TECPRESSO](https://tecpresso.co.jp/)
- [Runtime Converter](http://runtimeconverter.com/)
- [WebL'Agence](https://weblagence.com/)
- [Invoice Ninja](https://www.invoiceninja.com)
- [iMi digital](https://www.imi-digital.de/)
- [Earthlink](https://www.earthlink.ro/)
- [Steadfast Collective](https://steadfastcollective.com/)
- [We Are The Robots Inc.](https://watr.mx/)
- [Understand.io](https://www.understand.io/)
- [Abdel Elrafa](https://abdelelrafa.com)
- [Hyper Host](https://hyper.host)
- [Appoly](https://www.appoly.co.uk)
- [OP.GG](https://op.gg)

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
