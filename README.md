## View Live demo

[https://dreamhomes.obscode.joburg](https://dreamhomes.obscode.joburg)

## Terminology

<b>App or Application</b> refers to this website.
<b>Members</b> refers to a person who registers on this app as a customer.
<b>Admin</b> refers to a person who is registered to manage members.
<b>Super Admin</b> refers to an admin who has maximum control and can manage other admins.

## Admin

There are five admin levels in the app, Level 0 to level 4. Level 0 is reserved for normal users that are members. This level is set automatically when the user registers. Level 4 is for a super admin and, at this stage, it can only be set manually on the database. All other admins are given level 1 to 3. When a Super admin adds an admin they are automatically set to level 1. At this point of app development, we use only level 0, 1 and 4. Levels 2 and 3 are reserved for possible future need.

<b>Adding the Super Admin Admin</b>
The 1st admin should be a super admin so he can add other admins. A super admin can only be added by manually manipulating the users table in the database. Follow these procedures to add the very 1st admin.

1.	The admin-to-be must first register as a member on https://www.dhs.org.za/register. And set a password.
2.	Access the app's database to perfom manual changes.
3.	On the <b>users</b> table change the admin_level field of the new admin to 4 (Highest admin level).
4.	Add the super admin’s details on the admins table manually as follows:
-	id :Auto incremented primary key
-	user_id : should have the same value as the id field of the users table of this new admin.
-	level: should have a value of 4.
-	status: field should have a string value of “active”
5.	Delete the super admin from the members table and mics table.

## Database Tables of note

<b>Permissions table</b>
The recommended way to populate this table is to use a database seeder. Use php artisan db:seed to seed this table. db:seed reads columns from other tables in order to populate the permissions table. Make sure that these tables are present in the database before running db:seed: areas, beneficiaries, documents, home_addresses, members, miscs, next_of_kin, post_addresses, subscriptions.

However, although cumbersome, entries may also be inserted manually using this guide:

- <b>id</b>: Auto incremented primary key.
- <b>type</b>: These are permission types, e.g. write permission or read permission. Write permissions should be entered as “write” and read permissions as “read”. These values are used later within the code, so it is important to enter exactly as stated.
- <b>entity:</b> This is the name of the table for which the permission applies to. The entity is used later in the code and so this entry should be written exactly as the table name.
- <b>attribute:</b> This is the name of the field for which the permission applies to. The attribute names should be written exactly as the names of the fields the refer to.
- <b>created_at, updated_at:</b> These fields are not used. They are needed by the Laravel framework.