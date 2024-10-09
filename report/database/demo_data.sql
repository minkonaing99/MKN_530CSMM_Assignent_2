INSERT INTO category (user_id, happiness, anxiety, workload_mgmt, input_date) VALUES
    (1, 3, 3, 4, '2024-06-13'),
    (1, 4, 2, 2, '2024-06-14'),
    (1, 3, 4, 3, '2024-06-15'),
    (1, 2, 3, 4, '2024-06-16'),
    (1, 4, 5, 3, '2024-06-17'),
    (1, 5, 4, 2, '2024-06-18'),
    (1, 3, 2, 3, '2024-06-19'),
    (1, 2, 3, 4, '2024-06-20'),
    (1, 4, 3, 2, '2024-06-21'),
    (1, 1, 5, 3, '2024-06-22'),
    (1, 4, 3, 2, '2024-06-23'),
    (1, 1, 5, 3, '2024-06-24'),
    (1, 3, 4, 2, '2024-06-25'),
    (1, 2, 3, 4, '2024-06-26'),
    (1, 4, 2, 3, '2024-06-27'),
    (1, 5, 1, 2, '2024-06-28'),
    (1, 3, 3, 3, '2024-06-29'),
    (1, 4, 2, 4, '2024-06-30'),
    (1, 3, 4, 2, '2024-07-01'),
    (1, 2, 3, 4, '2024-07-02'),
    (1, 4, 2, 3, '2024-07-03'),
    (1, 5, 1, 2, '2024-07-04'),
    (1, 3, 3, 3, '2024-07-05'),
    (1, 4, 2, 4, '2024-07-06'),
    (1, 2, 4, 5, '2024-07-07'),
    (1, 1, 5, 3, '2024-07-08'),
    (1, 3, 3, 2, '2024-07-09'),
    (1, 4, 4, 4, '2024-07-10'),
    (1, 5, 2, 3, '2024-07-11'),
    (1, 2, 1, 3, '2024-07-12'),
    (1, 3, 3, 4, '2024-07-13'),
    (1, 4, 2, 2, '2024-07-14'),
    (1, 3, 4, 3, '2024-07-15'),
    (1, 2, 3, 4, '2024-07-16'),
    (1, 4, 5, 3, '2024-07-17'),
    (1, 5, 4, 2, '2024-07-18'),
    (1, 3, 2, 3, '2024-07-19'),
    (1, 2, 3, 4, '2024-07-20'),
    (1, 4, 3, 2, '2024-07-21'),
    (1, 1, 5, 3, '2024-07-22'),
    (1, 3, 3, 2, '2024-07-23'),
    (1, 4, 4, 4, '2024-07-24'),
    (1, 5, 2, 3, '2024-07-25'),
    (1, 2, 1, 3, '2024-07-26'),
    (1, 3, 3, 4, '2024-07-27'),
    (1, 4, 2, 2, '2024-07-28'),
    (1, 3, 4, 3, '2024-07-29'),
    (1, 2, 3, 4, '2024-07-30'),
    (1, 4, 5, 3, '2024-07-31'),
    (1, 5, 4, 2, '2024-08-01'),
    (1, 2, 3, 4, '2024-08-02'),
    (1, 4, 2, 3, '2024-08-03'),
    (1, 5, 1, 2, '2024-08-04'),
    (1, 3, 3, 3, '2024-08-05'),
    (1, 4, 2, 4, '2024-08-06'),
    (1, 2, 4, 5, '2024-08-08'),
    (1, 1, 5, 3, '2024-08-08'),
    (1, 3, 3, 2, '2024-08-09'),
    (1, 4, 4, 4, '2024-08-10'),
    (1, 5, 2, 3, '2024-08-11'),
    (1, 2, 1, 3, '2024-08-12'),
    (1, 3, 3, 4, '2024-08-13'),
    (1, 4, 2, 2, '2024-08-14'),
    (1, 3, 4, 3, '2024-08-15'),
    (1, 2, 3, 4, '2024-08-16'),
    (1, 4, 5, 3, '2024-08-17'),
    (1, 5, 4, 2, '2024-08-18'),
    (1, 3, 2, 3, '2024-08-19'),
    (1, 2, 3, 4, '2024-08-20'),
    (1, 4, 3, 2, '2024-08-21'),
    (1, 1, 5, 3, '2024-08-22'),
    (1, 3, 3, 2, '2024-08-23'),
    (1, 4, 4, 4, '2024-08-24'),
    (1, 5, 2, 3, '2024-08-25'),
    (1, 2, 1, 3, '2024-08-26'),
    (1, 3, 3, 4, '2024-08-27'),
    (1, 4, 2, 2, '2024-08-28'),
    (1, 3, 4, 3, '2024-08-29');
    
    update category set happiness = 1;
    update category set workload_mgmt = 1;
    update category set anxiety = 1;
    
    INSERT INTO announcement (user_id, major_id, title, description) VALUES
    (1, 1, '5505ELEMM Class Cancellation', 
    'Hello EEE Students, \n\nWe would like to inform you that there is NO class for 5505ELEMM Class 1 & Class 2 module by Tr Zarchi tomorrow because the lecturer is sick. We will inform you the substitute class. Sorry for the inconvenience. Thank you.'),

    (2, 2, '4012MAT Lecture Postponed', 
    'Dear MAS Students, \n\nPlease note that the 4012MAT lecture scheduled for tomorrow has been postponed due to unforeseen circumstances. A new date will be announced soon. We apologize for any inconvenience.'),

    (3, 3, '3030CS Workshop Rescheduled', 
    'Attention CS Students, \n\nThe 3030CS workshop on advanced algorithms has been rescheduled to next week due to technical issues. We will send out a notification with the new date and time. Thank you for your understanding.'),

    (1, 2, '1202MAS Guest Lecture Canceled', 
    'Hello MAS Students, \n\nUnfortunately, the guest lecture for 1202MAS by Dr. Aung has been canceled. We are working to reschedule it and will keep you updated. Sorry for any inconvenience this may cause.'),

    (2, 1, '5505ELEMM Assignment Deadline Extended', 
    'Dear EEE Students, \n\nThe deadline for the 5505ELEMM assignment has been extended by one week due to technical difficulties. Please make sure to submit your work by the new deadline. Thank you for your cooperation.');

    INSERT INTO category (user_id, happiness, anxiety, workload_mgmt, input_date) VALUES
    (2, 5, 4, 2, '2024-08-01'),
    (2, 2, 3, 4, '2024-08-02'),
    (2, 4, 2, 3, '2024-08-03'),
    (2, 5, 1, 2, '2024-08-04'),
    (2, 3, 3, 3, '2024-08-05'),
    (2, 4, 2, 4, '2024-08-06'),
    (2, 2, 4, 5, '2024-08-08'),
    (2, 1, 5, 3, '2024-08-08'),
    (2, 3, 3, 2, '2024-08-09'),
    (2, 4, 4, 4, '2024-08-10'),
    (2, 5, 2, 3, '2024-08-11'),
    (2, 2, 1, 3, '2024-08-12'),
    (2, 3, 3, 4, '2024-08-13'),
    (2, 4, 2, 2, '2024-08-14'),
    (2, 3, 4, 3, '2024-08-15'),
    (2, 2, 3, 4, '2024-08-16'),
    (2, 4, 5, 3, '2024-08-17'),
    (2, 5, 4, 2, '2024-08-18'),
    (2, 3, 2, 3, '2024-08-19'),
    (2, 2, 3, 4, '2024-08-20'),
    (2, 4, 3, 2, '2024-08-21'),
    (2, 1, 5, 3, '2024-08-22'),
    (2, 3, 3, 2, '2024-08-23'),
    (2, 4, 4, 4, '2024-08-24'),
    (2, 5, 2, 3, '2024-08-25'),
    (2, 2, 1, 3, '2024-08-26'),
    (2, 3, 3, 4, '2024-08-27'),
    (2, 4, 2, 2, '2024-08-28'),
    (2, 3, 4, 3, '2024-08-29');

    INSERT INTO category (user_id, happiness, anxiety, workload_mgmt, input_date) VALUES
    (3, 5, 4, 2, '2024-08-01'),
    (3, 2, 3, 4, '2024-08-02'),
    (3, 4, 2, 3, '2024-08-03'),
    (3, 5, 1, 2, '2024-08-04'),
    (3, 3, 3, 3, '2024-08-05'),
    (3, 4, 2, 4, '2024-08-06'),
    (3, 2, 4, 5, '2024-08-08'),
    (3, 1, 5, 3, '2024-08-08'),
    (3, 3, 3, 2, '2024-08-09'),
    (3, 4, 4, 4, '2024-08-10'),
    (3, 5, 2, 3, '2024-08-11'),
    (3, 2, 1, 3, '2024-08-12'),
    (3, 3, 3, 4, '2024-08-13'),
    (3, 4, 2, 2, '2024-08-14'),
    (3, 3, 4, 3, '2024-08-15'),
    (3, 2, 3, 4, '2024-08-16'),
    (3, 4, 5, 3, '2024-08-17'),
    (3, 5, 4, 2, '2024-08-18'),
    (3, 3, 2, 3, '2024-08-19'),
    (3, 2, 3, 4, '2024-08-20'),
    (3, 4, 3, 2, '2024-08-21'),
    (3, 1, 5, 3, '2024-08-22'),
    (3, 3, 3, 2, '2024-08-23'),
    (3, 4, 4, 4, '2024-08-24'),
    (3, 5, 2, 3, '2024-08-25'),
    (3, 2, 1, 3, '2024-08-26'),
    (3, 3, 3, 4, '2024-08-27'),
    (3, 4, 2, 2, '2024-08-28'),
    (3, 3, 4, 3, '2024-08-29');