<?php

if($_POST){
		//We shall SQL escape all inputs
		$username = $wpdb->escape($_REQUEST['username']);
		if(empty($username)) {
			echo "User name should not be empty.";
			exit();
		}
		$email = $wpdb->escape($_REQUEST['email']);
		if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/", $email)) {
			echo "Please enter a valid email.";
			exit();
		}

			$random_password = wp_generate_password( 12, false );
			$status = wp_create_user( $username, $random_password, $email );
			if ( is_wp_error($status) )
				echo "Username already exists. Please try another one.";
			else {
				$from = get_option('admin_email');
		                $headers = 'From: '.$from . "\r\n";
		                $subject = "Registration successful";
		                $msg = "Registration successful.\nYour login details\nUsername: $username\nPassword: $random_password";
		                wp_mail( $email, $subject, $msg, $headers );
				echo "Please check your email for login details.";
			}

		exit();

	}