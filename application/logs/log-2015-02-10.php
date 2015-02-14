<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

DEBUG - 2015-02-10 00:02:52 --> Config Class Initialized
DEBUG - 2015-02-10 00:02:52 --> Hooks Class Initialized
DEBUG - 2015-02-10 00:02:52 --> Utf8 Class Initialized
DEBUG - 2015-02-10 00:02:52 --> UTF-8 Support Disabled
DEBUG - 2015-02-10 00:02:52 --> URI Class Initialized
DEBUG - 2015-02-10 00:02:52 --> Router Class Initialized
DEBUG - 2015-02-10 00:02:52 --> Output Class Initialized
DEBUG - 2015-02-10 00:02:52 --> Security Class Initialized
DEBUG - 2015-02-10 00:02:52 --> Input Class Initialized
DEBUG - 2015-02-10 00:02:52 --> Global POST and COOKIE data sanitized
DEBUG - 2015-02-10 00:02:52 --> Language Class Initialized
DEBUG - 2015-02-10 00:02:52 --> Loader Class Initialized
DEBUG - 2015-02-10 00:02:52 --> Controller Class Initialized
DEBUG - 2015-02-10 00:02:52 --> Helper loaded: url_helper
DEBUG - 2015-02-10 00:02:52 --> Encrypt Class Initialized
DEBUG - 2015-02-10 00:02:52 --> Session Class Initialized
DEBUG - 2015-02-10 00:02:52 --> Helper loaded: string_helper
DEBUG - 2015-02-10 00:02:52 --> Encrypt class already loaded. Second attempt ignored.
DEBUG - 2015-02-10 00:02:52 --> Session routines successfully run
DEBUG - 2015-02-10 00:02:52 --> Model Class Initialized
DEBUG - 2015-02-10 00:02:52 --> Database Driver Class Initialized
DEBUG - 2015-02-10 00:02:52 --> Config file loaded: application/config/self_config.php
DEBUG - 2015-02-10 00:02:52 --> Session class already loaded. Second attempt ignored.
DEBUG - 2015-02-10 00:02:52 --> Services:index=English
DEBUG - 2015-02-10 00:02:52 --> 1 = English
DEBUG - 2015-02-10 00:02:52 --> File loaded: application/views/header.php
DEBUG - 2015-02-10 00:02:52 --> File loaded: application/views/services.php
DEBUG - 2015-02-10 00:02:52 --> File loaded: application/views/footer_service.php
DEBUG - 2015-02-10 00:02:52 --> Final output sent to browser
DEBUG - 2015-02-10 00:02:52 --> Total execution time: 0.0421
DEBUG - 2015-02-10 00:11:33 --> Config Class Initialized
DEBUG - 2015-02-10 00:11:33 --> Hooks Class Initialized
DEBUG - 2015-02-10 00:11:33 --> Utf8 Class Initialized
DEBUG - 2015-02-10 00:11:33 --> UTF-8 Support Disabled
DEBUG - 2015-02-10 00:11:33 --> URI Class Initialized
DEBUG - 2015-02-10 00:11:33 --> Router Class Initialized
DEBUG - 2015-02-10 00:11:33 --> Output Class Initialized
DEBUG - 2015-02-10 00:11:33 --> Security Class Initialized
DEBUG - 2015-02-10 00:11:33 --> Input Class Initialized
DEBUG - 2015-02-10 00:11:33 --> Global POST and COOKIE data sanitized
DEBUG - 2015-02-10 00:11:33 --> Language Class Initialized
DEBUG - 2015-02-10 00:11:33 --> Loader Class Initialized
DEBUG - 2015-02-10 00:11:33 --> Controller Class Initialized
DEBUG - 2015-02-10 00:11:33 --> Helper loaded: url_helper
DEBUG - 2015-02-10 00:11:33 --> Encrypt Class Initialized
DEBUG - 2015-02-10 00:11:33 --> Session Class Initialized
DEBUG - 2015-02-10 00:11:33 --> Helper loaded: string_helper
DEBUG - 2015-02-10 00:11:33 --> Encrypt class already loaded. Second attempt ignored.
DEBUG - 2015-02-10 00:11:33 --> Session routines successfully run
DEBUG - 2015-02-10 00:11:33 --> Session class already loaded. Second attempt ignored.
DEBUG - 2015-02-10 00:11:33 --> Config file loaded: application/config/self_config.php
DEBUG - 2015-02-10 00:11:33 --> Model Class Initialized
DEBUG - 2015-02-10 00:11:33 --> Database Driver Class Initialized
DEBUG - 2015-02-10 00:11:33 --> Self_function class already loaded. Second attempt ignored.
DEBUG - 2015-02-10 00:11:33 --> Self_function class already loaded. Second attempt ignored.
DEBUG - 2015-02-10 00:11:33 --> Self_function class already loaded. Second attempt ignored.
DEBUG - 2015-02-10 00:11:33 --> inside set_student
DEBUG - 2015-02-10 00:11:33 --> count(assign_id) as count
                    from assignment
                    where class = 9 and
                    (
                        section = 'A' or section = 'Z'
                    ) and
                    cat_id= 1 and
                    assign_id not in
                        (
                            select assign_id
                            from assign_seen_student
                            where student_id = 6
                        )
DEBUG - 2015-02-10 00:11:33 --> count(assign_id) as count
                    from assignment
                    where class = 9 and
                    (
                        section = 'A' or section = 'Z'
                    ) and
                    cat_id= 2 and
                    assign_id not in
                        (
                            select assign_id
                            from assign_seen_student
                            where student_id = 6
                        )
DEBUG - 2015-02-10 00:11:33 --> count(assign_id) as count
                    from assignment
                    where class = 9 and
                    (
                        section = 'A' or section = 'Z'
                    ) and
                    cat_id= 3 and
                    assign_id not in
                        (
                            select assign_id
                            from assign_seen_student
                            where student_id = 6
                        )
DEBUG - 2015-02-10 00:11:33 --> count(assign_id) as count
                    from assignment
                    where class = 9 and
                    (
                        section = 'A' or section = 'Z'
                    ) and
                    cat_id= 4 and
                    assign_id not in
                        (
                            select assign_id
                            from assign_seen_student
                            where student_id = 6
                        )
DEBUG - 2015-02-10 00:11:33 --> count(assign_id) as count
                    from assignment
                    where class = 9 and
                    (
                        section = 'A' or section = 'Z'
                    ) and
                    cat_id= 5 and
                    assign_id not in
                        (
                            select assign_id
                            from assign_seen_student
                            where student_id = 6
                        )
DEBUG - 2015-02-10 00:11:33 --> model:get_notice= txt, utc_in from notice where (class=0 or (class=9 and(section = 'Z' or section='A'))) and UNIX_TIMESTAMP() < utc_valid
DEBUG - 2015-02-10 00:11:33 --> File loaded: application/views/header.php
DEBUG - 2015-02-10 00:11:33 --> File loaded: application/views/home.php
DEBUG - 2015-02-10 00:11:33 --> File loaded: application/views/footer.php
DEBUG - 2015-02-10 00:11:33 --> Final output sent to browser
DEBUG - 2015-02-10 00:11:33 --> Total execution time: 0.1266
DEBUG - 2015-02-10 00:13:28 --> Config Class Initialized
DEBUG - 2015-02-10 00:13:28 --> Hooks Class Initialized
DEBUG - 2015-02-10 00:13:28 --> Utf8 Class Initialized
DEBUG - 2015-02-10 00:13:28 --> UTF-8 Support Disabled
DEBUG - 2015-02-10 00:13:28 --> URI Class Initialized
DEBUG - 2015-02-10 00:13:28 --> Router Class Initialized
DEBUG - 2015-02-10 00:13:28 --> Output Class Initialized
DEBUG - 2015-02-10 00:13:28 --> Security Class Initialized
DEBUG - 2015-02-10 00:13:28 --> Input Class Initialized
DEBUG - 2015-02-10 00:13:28 --> Global POST and COOKIE data sanitized
DEBUG - 2015-02-10 00:13:28 --> Language Class Initialized
DEBUG - 2015-02-10 00:13:28 --> Loader Class Initialized
DEBUG - 2015-02-10 00:13:28 --> Controller Class Initialized
DEBUG - 2015-02-10 00:13:28 --> Helper loaded: url_helper
DEBUG - 2015-02-10 00:13:28 --> Encrypt Class Initialized
DEBUG - 2015-02-10 00:13:28 --> Session Class Initialized
DEBUG - 2015-02-10 00:13:28 --> Helper loaded: string_helper
DEBUG - 2015-02-10 00:13:28 --> Encrypt class already loaded. Second attempt ignored.
DEBUG - 2015-02-10 00:13:28 --> Session routines successfully run
DEBUG - 2015-02-10 00:13:28 --> Model Class Initialized
DEBUG - 2015-02-10 00:13:28 --> Database Driver Class Initialized
DEBUG - 2015-02-10 00:13:28 --> Config file loaded: application/config/self_config.php
DEBUG - 2015-02-10 00:13:28 --> Session class already loaded. Second attempt ignored.
DEBUG - 2015-02-10 00:13:28 --> Services:index=English
DEBUG - 2015-02-10 00:13:28 --> 1 = English
DEBUG - 2015-02-10 00:13:28 --> File loaded: application/views/header.php
DEBUG - 2015-02-10 00:13:28 --> File loaded: application/views/services.php
DEBUG - 2015-02-10 00:13:28 --> File loaded: application/views/footer_service.php
DEBUG - 2015-02-10 00:13:28 --> Final output sent to browser
DEBUG - 2015-02-10 00:13:28 --> Total execution time: 0.1095
DEBUG - 2015-02-10 00:13:29 --> Config Class Initialized
DEBUG - 2015-02-10 00:13:29 --> Hooks Class Initialized
DEBUG - 2015-02-10 00:13:29 --> Utf8 Class Initialized
DEBUG - 2015-02-10 00:13:29 --> UTF-8 Support Disabled
DEBUG - 2015-02-10 00:13:29 --> URI Class Initialized
DEBUG - 2015-02-10 00:13:29 --> Router Class Initialized
DEBUG - 2015-02-10 00:13:29 --> Output Class Initialized
DEBUG - 2015-02-10 00:13:29 --> Security Class Initialized
DEBUG - 2015-02-10 00:13:29 --> Input Class Initialized
DEBUG - 2015-02-10 00:13:29 --> Global POST and COOKIE data sanitized
DEBUG - 2015-02-10 00:13:29 --> Language Class Initialized
DEBUG - 2015-02-10 00:13:29 --> Loader Class Initialized
DEBUG - 2015-02-10 00:13:29 --> Controller Class Initialized
DEBUG - 2015-02-10 00:13:29 --> Helper loaded: url_helper
DEBUG - 2015-02-10 00:13:29 --> Encrypt Class Initialized
DEBUG - 2015-02-10 00:13:29 --> Session Class Initialized
DEBUG - 2015-02-10 00:13:29 --> Helper loaded: string_helper
DEBUG - 2015-02-10 00:13:29 --> Encrypt class already loaded. Second attempt ignored.
DEBUG - 2015-02-10 00:13:29 --> Session routines successfully run
DEBUG - 2015-02-10 00:13:29 --> Model Class Initialized
DEBUG - 2015-02-10 00:13:29 --> Database Driver Class Initialized
DEBUG - 2015-02-10 00:13:29 --> Config file loaded: application/config/self_config.php
DEBUG - 2015-02-10 00:13:29 --> Session class already loaded. Second attempt ignored.
DEBUG - 2015-02-10 00:13:29 --> Self_function class already loaded. Second attempt ignored.
DEBUG - 2015-02-10 00:13:29 --> Self_function class already loaded. Second attempt ignored.
DEBUG - 2015-02-10 00:13:29 --> Helper loaded: security_helper
DEBUG - 2015-02-10 00:13:29 --> Notes:index=English
DEBUG - 2015-02-10 00:13:29 --> 1 = English
DEBUG - 2015-02-10 00:13:29 --> model:get_notes 1 1
DEBUG - 2015-02-10 00:13:29 --> notes.notes_id, notes.txt from notes where class = 9 and ( notes.section = 'Z' or notes.section = 'A') and cat_id= 1 and utc_valid > UNIX_TIMESTAMP() order by notes_id limit 8 offset 0
DEBUG - 2015-02-10 00:13:29 --> File loaded: application/views/header.php
DEBUG - 2015-02-10 00:13:29 --> notes:view 1 English
ERROR - 2015-02-10 00:13:29 --> Severity: Warning  --> copy(): open_basedir restriction in effect. File(/var/www/classroome/assets/work/notes/tea_notes_4.doc) is not within the allowed path(s): (/srv/http/:/home/:/tmp/:/usr/share/pear/:/usr/share/webapps/:/usr/bin/) /srv/http/work/application/libraries/Self_function.php 55
ERROR - 2015-02-10 00:13:29 --> Severity: Warning  --> copy(): open_basedir restriction in effect. File(/var/www/classroome/assets/work/notes/tea_notes_5.doc) is not within the allowed path(s): (/srv/http/:/home/:/tmp/:/usr/share/pear/:/usr/share/webapps/:/usr/bin/) /srv/http/work/application/libraries/Self_function.php 55
ERROR - 2015-02-10 00:13:29 --> Severity: Warning  --> copy(): open_basedir restriction in effect. File(/var/www/classroome/assets/work/notes/tea_notes_6.doc) is not within the allowed path(s): (/srv/http/:/home/:/tmp/:/usr/share/pear/:/usr/share/webapps/:/usr/bin/) /srv/http/work/application/libraries/Self_function.php 55
ERROR - 2015-02-10 00:13:29 --> Severity: Warning  --> copy(): open_basedir restriction in effect. File(/var/www/classroome/assets/work/notes/tea_notes_7.doc) is not within the allowed path(s): (/srv/http/:/home/:/tmp/:/usr/share/pear/:/usr/share/webapps/:/usr/bin/) /srv/http/work/application/libraries/Self_function.php 55
ERROR - 2015-02-10 00:13:29 --> Severity: Warning  --> copy(): open_basedir restriction in effect. File(/var/www/classroome/assets/work/notes/tea_notes_8.doc) is not within the allowed path(s): (/srv/http/:/home/:/tmp/:/usr/share/pear/:/usr/share/webapps/:/usr/bin/) /srv/http/work/application/libraries/Self_function.php 55
ERROR - 2015-02-10 00:13:29 --> Severity: Warning  --> copy(): open_basedir restriction in effect. File(/var/www/classroome/assets/work/notes/tea_notes_9.doc) is not within the allowed path(s): (/srv/http/:/home/:/tmp/:/usr/share/pear/:/usr/share/webapps/:/usr/bin/) /srv/http/work/application/libraries/Self_function.php 55
ERROR - 2015-02-10 00:13:29 --> Severity: Warning  --> copy(): open_basedir restriction in effect. File(/var/www/classroome/assets/work/notes/tea_notes_15.doc) is not within the allowed path(s): (/srv/http/:/home/:/tmp/:/usr/share/pear/:/usr/share/webapps/:/usr/bin/) /srv/http/work/application/libraries/Self_function.php 55
ERROR - 2015-02-10 00:13:29 --> Severity: Warning  --> copy(): open_basedir restriction in effect. File(/var/www/classroome/assets/work/notes/tea_notes_16.doc) is not within the allowed path(s): (/srv/http/:/home/:/tmp/:/usr/share/pear/:/usr/share/webapps/:/usr/bin/) /srv/http/work/application/libraries/Self_function.php 55
DEBUG - 2015-02-10 00:13:29 --> File loaded: application/views/notes_student.php
DEBUG - 2015-02-10 00:13:29 --> File loaded: application/views/footer.php
DEBUG - 2015-02-10 00:13:29 --> Final output sent to browser
DEBUG - 2015-02-10 00:13:29 --> Total execution time: 0.1266
DEBUG - 2015-02-10 00:15:03 --> Config Class Initialized
DEBUG - 2015-02-10 00:15:03 --> Hooks Class Initialized
DEBUG - 2015-02-10 00:15:03 --> Utf8 Class Initialized
DEBUG - 2015-02-10 00:15:03 --> UTF-8 Support Disabled
DEBUG - 2015-02-10 00:15:03 --> URI Class Initialized
DEBUG - 2015-02-10 00:15:03 --> Router Class Initialized
DEBUG - 2015-02-10 00:15:03 --> Output Class Initialized
DEBUG - 2015-02-10 00:15:03 --> Security Class Initialized
DEBUG - 2015-02-10 00:15:03 --> Input Class Initialized
DEBUG - 2015-02-10 00:15:03 --> Global POST and COOKIE data sanitized
DEBUG - 2015-02-10 00:15:03 --> Language Class Initialized
DEBUG - 2015-02-10 00:15:03 --> Loader Class Initialized
DEBUG - 2015-02-10 00:15:03 --> Controller Class Initialized
DEBUG - 2015-02-10 00:15:03 --> Helper loaded: url_helper
DEBUG - 2015-02-10 00:15:03 --> Encrypt Class Initialized
DEBUG - 2015-02-10 00:15:03 --> Session Class Initialized
DEBUG - 2015-02-10 00:15:03 --> Helper loaded: string_helper
DEBUG - 2015-02-10 00:15:03 --> Encrypt class already loaded. Second attempt ignored.
DEBUG - 2015-02-10 00:15:03 --> Session routines successfully run
DEBUG - 2015-02-10 00:15:03 --> Session class already loaded. Second attempt ignored.
DEBUG - 2015-02-10 00:15:03 --> Config file loaded: application/config/self_config.php
DEBUG - 2015-02-10 00:15:03 --> Model Class Initialized
DEBUG - 2015-02-10 00:15:03 --> Database Driver Class Initialized
DEBUG - 2015-02-10 00:15:03 --> Self_function class already loaded. Second attempt ignored.
DEBUG - 2015-02-10 00:15:03 --> Self_function class already loaded. Second attempt ignored.
DEBUG - 2015-02-10 00:15:03 --> Self_function class already loaded. Second attempt ignored.
DEBUG - 2015-02-10 00:15:03 --> inside set_student
DEBUG - 2015-02-10 00:15:03 --> count(assign_id) as count
                    from assignment
                    where class = 9 and
                    (
                        section = 'A' or section = 'Z'
                    ) and
                    cat_id= 1 and
                    assign_id not in
                        (
                            select assign_id
                            from assign_seen_student
                            where student_id = 6
                        )
DEBUG - 2015-02-10 00:15:03 --> count(assign_id) as count
                    from assignment
                    where class = 9 and
                    (
                        section = 'A' or section = 'Z'
                    ) and
                    cat_id= 2 and
                    assign_id not in
                        (
                            select assign_id
                            from assign_seen_student
                            where student_id = 6
                        )
DEBUG - 2015-02-10 00:15:03 --> count(assign_id) as count
                    from assignment
                    where class = 9 and
                    (
                        section = 'A' or section = 'Z'
                    ) and
                    cat_id= 3 and
                    assign_id not in
                        (
                            select assign_id
                            from assign_seen_student
                            where student_id = 6
                        )
DEBUG - 2015-02-10 00:15:03 --> count(assign_id) as count
                    from assignment
                    where class = 9 and
                    (
                        section = 'A' or section = 'Z'
                    ) and
                    cat_id= 4 and
                    assign_id not in
                        (
                            select assign_id
                            from assign_seen_student
                            where student_id = 6
                        )
DEBUG - 2015-02-10 00:15:03 --> count(assign_id) as count
                    from assignment
                    where class = 9 and
                    (
                        section = 'A' or section = 'Z'
                    ) and
                    cat_id= 5 and
                    assign_id not in
                        (
                            select assign_id
                            from assign_seen_student
                            where student_id = 6
                        )
DEBUG - 2015-02-10 00:15:03 --> model:get_notice= txt, utc_in from notice where (class=0 or (class=9 and(section = 'Z' or section='A'))) and UNIX_TIMESTAMP() < utc_valid
DEBUG - 2015-02-10 00:15:03 --> File loaded: application/views/header.php
DEBUG - 2015-02-10 00:15:03 --> File loaded: application/views/home.php
DEBUG - 2015-02-10 00:15:03 --> File loaded: application/views/footer.php
DEBUG - 2015-02-10 00:15:03 --> Final output sent to browser
DEBUG - 2015-02-10 00:15:03 --> Total execution time: 0.1785
DEBUG - 2015-02-10 00:15:05 --> Config Class Initialized
DEBUG - 2015-02-10 00:15:05 --> Hooks Class Initialized
DEBUG - 2015-02-10 00:15:05 --> Utf8 Class Initialized
DEBUG - 2015-02-10 00:15:05 --> UTF-8 Support Disabled
DEBUG - 2015-02-10 00:15:05 --> URI Class Initialized
DEBUG - 2015-02-10 00:15:05 --> Router Class Initialized
DEBUG - 2015-02-10 00:15:05 --> Output Class Initialized
DEBUG - 2015-02-10 00:15:05 --> Security Class Initialized
DEBUG - 2015-02-10 00:15:05 --> Input Class Initialized
DEBUG - 2015-02-10 00:15:05 --> Global POST and COOKIE data sanitized
DEBUG - 2015-02-10 00:15:05 --> Language Class Initialized
DEBUG - 2015-02-10 00:15:05 --> Loader Class Initialized
DEBUG - 2015-02-10 00:15:05 --> Controller Class Initialized
DEBUG - 2015-02-10 00:15:05 --> Helper loaded: url_helper
DEBUG - 2015-02-10 00:15:05 --> Encrypt Class Initialized
DEBUG - 2015-02-10 00:15:05 --> Session Class Initialized
DEBUG - 2015-02-10 00:15:05 --> Helper loaded: string_helper
DEBUG - 2015-02-10 00:15:05 --> Encrypt class already loaded. Second attempt ignored.
DEBUG - 2015-02-10 00:15:05 --> Session routines successfully run
DEBUG - 2015-02-10 00:15:05 --> Model Class Initialized
DEBUG - 2015-02-10 00:15:05 --> Database Driver Class Initialized
DEBUG - 2015-02-10 00:15:05 --> Config file loaded: application/config/self_config.php
DEBUG - 2015-02-10 00:15:05 --> Session class already loaded. Second attempt ignored.
DEBUG - 2015-02-10 00:15:05 --> Services:index=English
DEBUG - 2015-02-10 00:15:05 --> 1 = English
DEBUG - 2015-02-10 00:15:05 --> File loaded: application/views/header.php
DEBUG - 2015-02-10 00:15:05 --> File loaded: application/views/services.php
DEBUG - 2015-02-10 00:15:05 --> File loaded: application/views/footer_service.php
DEBUG - 2015-02-10 00:15:05 --> Final output sent to browser
DEBUG - 2015-02-10 00:15:05 --> Total execution time: 0.0358
DEBUG - 2015-02-10 00:15:10 --> Config Class Initialized
DEBUG - 2015-02-10 00:15:10 --> Hooks Class Initialized
DEBUG - 2015-02-10 00:15:10 --> Utf8 Class Initialized
DEBUG - 2015-02-10 00:15:10 --> UTF-8 Support Disabled
DEBUG - 2015-02-10 00:15:10 --> URI Class Initialized
DEBUG - 2015-02-10 00:15:10 --> Router Class Initialized
DEBUG - 2015-02-10 00:15:10 --> Output Class Initialized
DEBUG - 2015-02-10 00:15:10 --> Security Class Initialized
DEBUG - 2015-02-10 00:15:10 --> Input Class Initialized
DEBUG - 2015-02-10 00:15:10 --> Global POST and COOKIE data sanitized
DEBUG - 2015-02-10 00:15:10 --> Language Class Initialized
DEBUG - 2015-02-10 00:15:10 --> Loader Class Initialized
DEBUG - 2015-02-10 00:15:10 --> Controller Class Initialized
DEBUG - 2015-02-10 00:15:10 --> Helper loaded: url_helper
DEBUG - 2015-02-10 00:15:10 --> Encrypt Class Initialized
DEBUG - 2015-02-10 00:15:10 --> Session Class Initialized
DEBUG - 2015-02-10 00:15:10 --> Helper loaded: string_helper
DEBUG - 2015-02-10 00:15:10 --> Encrypt class already loaded. Second attempt ignored.
DEBUG - 2015-02-10 00:15:10 --> Session routines successfully run
DEBUG - 2015-02-10 00:15:10 --> Session class already loaded. Second attempt ignored.
DEBUG - 2015-02-10 00:15:10 --> Config file loaded: application/config/self_config.php
DEBUG - 2015-02-10 00:15:10 --> Model Class Initialized
DEBUG - 2015-02-10 00:15:11 --> Database Driver Class Initialized
DEBUG - 2015-02-10 00:15:11 --> Session class already loaded. Second attempt ignored.
DEBUG - 2015-02-10 00:15:11 --> Self_function class already loaded. Second attempt ignored.
DEBUG - 2015-02-10 00:15:11 --> Helper loaded: form_helper
DEBUG - 2015-02-10 00:15:11 --> Helper loaded: security_helper
DEBUG - 2015-02-10 00:15:11 --> inside else of index function
DEBUG - 2015-02-10 00:15:11 --> File loaded: application/views/header.php
DEBUG - 2015-02-10 00:15:11 --> File loaded: application/views/wizquiz_start.php
DEBUG - 2015-02-10 00:15:11 --> File loaded: application/views/footer.php
DEBUG - 2015-02-10 00:15:11 --> Final output sent to browser
DEBUG - 2015-02-10 00:15:11 --> Total execution time: 0.4513
DEBUG - 2015-02-10 00:17:54 --> Config Class Initialized
DEBUG - 2015-02-10 00:17:54 --> Hooks Class Initialized
DEBUG - 2015-02-10 00:17:54 --> Utf8 Class Initialized
DEBUG - 2015-02-10 00:17:54 --> UTF-8 Support Disabled
DEBUG - 2015-02-10 00:17:54 --> URI Class Initialized
DEBUG - 2015-02-10 00:17:54 --> Router Class Initialized
DEBUG - 2015-02-10 00:17:54 --> Output Class Initialized
DEBUG - 2015-02-10 00:17:54 --> Security Class Initialized
DEBUG - 2015-02-10 00:17:54 --> Input Class Initialized
DEBUG - 2015-02-10 00:17:54 --> Global POST and COOKIE data sanitized
DEBUG - 2015-02-10 00:17:54 --> Language Class Initialized
DEBUG - 2015-02-10 00:17:54 --> Loader Class Initialized
DEBUG - 2015-02-10 00:17:54 --> Controller Class Initialized
DEBUG - 2015-02-10 00:17:54 --> Helper loaded: url_helper
DEBUG - 2015-02-10 00:17:54 --> Encrypt Class Initialized
DEBUG - 2015-02-10 00:17:54 --> Session Class Initialized
DEBUG - 2015-02-10 00:17:54 --> Helper loaded: string_helper
DEBUG - 2015-02-10 00:17:54 --> Encrypt class already loaded. Second attempt ignored.
DEBUG - 2015-02-10 00:17:54 --> Session routines successfully run
DEBUG - 2015-02-10 00:17:54 --> Session class already loaded. Second attempt ignored.
DEBUG - 2015-02-10 00:17:54 --> Config file loaded: application/config/self_config.php
DEBUG - 2015-02-10 00:17:54 --> Model Class Initialized
DEBUG - 2015-02-10 00:17:54 --> Database Driver Class Initialized
DEBUG - 2015-02-10 00:17:54 --> Self_function class already loaded. Second attempt ignored.
DEBUG - 2015-02-10 00:17:54 --> Self_function class already loaded. Second attempt ignored.
DEBUG - 2015-02-10 00:17:54 --> Self_function class already loaded. Second attempt ignored.
DEBUG - 2015-02-10 00:17:54 --> inside set_student
DEBUG - 2015-02-10 00:17:54 --> count(assign_id) as count
                    from assignment
                    where class = 9 and
                    (
                        section = 'A' or section = 'Z'
                    ) and
                    cat_id= 1 and
                    assign_id not in
                        (
                            select assign_id
                            from assign_seen_student
                            where student_id = 6
                        )
DEBUG - 2015-02-10 00:17:54 --> count(assign_id) as count
                    from assignment
                    where class = 9 and
                    (
                        section = 'A' or section = 'Z'
                    ) and
                    cat_id= 2 and
                    assign_id not in
                        (
                            select assign_id
                            from assign_seen_student
                            where student_id = 6
                        )
DEBUG - 2015-02-10 00:17:54 --> count(assign_id) as count
                    from assignment
                    where class = 9 and
                    (
                        section = 'A' or section = 'Z'
                    ) and
                    cat_id= 3 and
                    assign_id not in
                        (
                            select assign_id
                            from assign_seen_student
                            where student_id = 6
                        )
DEBUG - 2015-02-10 00:17:54 --> count(assign_id) as count
                    from assignment
                    where class = 9 and
                    (
                        section = 'A' or section = 'Z'
                    ) and
                    cat_id= 4 and
                    assign_id not in
                        (
                            select assign_id
                            from assign_seen_student
                            where student_id = 6
                        )
DEBUG - 2015-02-10 00:17:54 --> count(assign_id) as count
                    from assignment
                    where class = 9 and
                    (
                        section = 'A' or section = 'Z'
                    ) and
                    cat_id= 5 and
                    assign_id not in
                        (
                            select assign_id
                            from assign_seen_student
                            where student_id = 6
                        )
DEBUG - 2015-02-10 00:17:54 --> model:get_notice= txt, utc_in from notice where (class=0 or (class=9 and(section = 'Z' or section='A'))) and UNIX_TIMESTAMP() < utc_valid
DEBUG - 2015-02-10 00:17:54 --> File loaded: application/views/header.php
DEBUG - 2015-02-10 00:17:54 --> File loaded: application/views/home.php
DEBUG - 2015-02-10 00:17:54 --> File loaded: application/views/footer.php
DEBUG - 2015-02-10 00:17:54 --> Final output sent to browser
DEBUG - 2015-02-10 00:17:54 --> Total execution time: 0.1042
DEBUG - 2015-02-10 00:19:15 --> Config Class Initialized
DEBUG - 2015-02-10 00:19:15 --> Hooks Class Initialized
DEBUG - 2015-02-10 00:19:15 --> Utf8 Class Initialized
DEBUG - 2015-02-10 00:19:15 --> UTF-8 Support Disabled
DEBUG - 2015-02-10 00:19:15 --> URI Class Initialized
DEBUG - 2015-02-10 00:19:15 --> Router Class Initialized
DEBUG - 2015-02-10 00:19:15 --> Output Class Initialized
DEBUG - 2015-02-10 00:19:15 --> Security Class Initialized
DEBUG - 2015-02-10 00:19:15 --> Input Class Initialized
DEBUG - 2015-02-10 00:19:15 --> Global POST and COOKIE data sanitized
DEBUG - 2015-02-10 00:19:15 --> Language Class Initialized
DEBUG - 2015-02-10 00:19:15 --> Loader Class Initialized
DEBUG - 2015-02-10 00:19:15 --> Controller Class Initialized
DEBUG - 2015-02-10 00:19:15 --> Helper loaded: url_helper
DEBUG - 2015-02-10 00:19:15 --> Encrypt Class Initialized
DEBUG - 2015-02-10 00:19:15 --> Session Class Initialized
DEBUG - 2015-02-10 00:19:15 --> Helper loaded: string_helper
DEBUG - 2015-02-10 00:19:15 --> Encrypt class already loaded. Second attempt ignored.
DEBUG - 2015-02-10 00:19:15 --> Session routines successfully run
DEBUG - 2015-02-10 00:19:15 --> Session class already loaded. Second attempt ignored.
DEBUG - 2015-02-10 00:19:15 --> Config file loaded: application/config/self_config.php
DEBUG - 2015-02-10 00:19:15 --> Model Class Initialized
DEBUG - 2015-02-10 00:19:15 --> Database Driver Class Initialized
DEBUG - 2015-02-10 00:19:15 --> Self_function class already loaded. Second attempt ignored.
DEBUG - 2015-02-10 00:19:15 --> Self_function class already loaded. Second attempt ignored.
DEBUG - 2015-02-10 00:19:15 --> Self_function class already loaded. Second attempt ignored.
DEBUG - 2015-02-10 00:19:15 --> inside set_student
DEBUG - 2015-02-10 00:19:15 --> count(assign_id) as count
                    from assignment
                    where class = 9 and
                    (
                        section = 'A' or section = 'Z'
                    ) and
                    cat_id= 1 and
                    assign_id not in
                        (
                            select assign_id
                            from assign_seen_student
                            where student_id = 6
                        )
DEBUG - 2015-02-10 00:19:15 --> count(assign_id) as count
                    from assignment
                    where class = 9 and
                    (
                        section = 'A' or section = 'Z'
                    ) and
                    cat_id= 2 and
                    assign_id not in
                        (
                            select assign_id
                            from assign_seen_student
                            where student_id = 6
                        )
DEBUG - 2015-02-10 00:19:15 --> count(assign_id) as count
                    from assignment
                    where class = 9 and
                    (
                        section = 'A' or section = 'Z'
                    ) and
                    cat_id= 3 and
                    assign_id not in
                        (
                            select assign_id
                            from assign_seen_student
                            where student_id = 6
                        )
DEBUG - 2015-02-10 00:19:15 --> count(assign_id) as count
                    from assignment
                    where class = 9 and
                    (
                        section = 'A' or section = 'Z'
                    ) and
                    cat_id= 4 and
                    assign_id not in
                        (
                            select assign_id
                            from assign_seen_student
                            where student_id = 6
                        )
DEBUG - 2015-02-10 00:19:15 --> count(assign_id) as count
                    from assignment
                    where class = 9 and
                    (
                        section = 'A' or section = 'Z'
                    ) and
                    cat_id= 5 and
                    assign_id not in
                        (
                            select assign_id
                            from assign_seen_student
                            where student_id = 6
                        )
DEBUG - 2015-02-10 00:19:15 --> model:get_notice= txt, utc_in from notice where (class=0 or (class=9 and(section = 'Z' or section='A'))) and UNIX_TIMESTAMP() < utc_valid
DEBUG - 2015-02-10 00:19:15 --> File loaded: application/views/header.php
DEBUG - 2015-02-10 00:19:15 --> File loaded: application/views/home.php
DEBUG - 2015-02-10 00:19:15 --> File loaded: application/views/footer.php
DEBUG - 2015-02-10 00:19:15 --> Final output sent to browser
DEBUG - 2015-02-10 00:19:15 --> Total execution time: 0.1028
DEBUG - 2015-02-10 00:19:18 --> Config Class Initialized
DEBUG - 2015-02-10 00:19:18 --> Hooks Class Initialized
DEBUG - 2015-02-10 00:19:18 --> Utf8 Class Initialized
DEBUG - 2015-02-10 00:19:18 --> UTF-8 Support Disabled
DEBUG - 2015-02-10 00:19:18 --> URI Class Initialized
DEBUG - 2015-02-10 00:19:18 --> Router Class Initialized
DEBUG - 2015-02-10 00:19:18 --> Output Class Initialized
DEBUG - 2015-02-10 00:19:18 --> Security Class Initialized
DEBUG - 2015-02-10 00:19:18 --> Input Class Initialized
DEBUG - 2015-02-10 00:19:18 --> Global POST and COOKIE data sanitized
DEBUG - 2015-02-10 00:19:18 --> Language Class Initialized
DEBUG - 2015-02-10 00:19:18 --> Loader Class Initialized
DEBUG - 2015-02-10 00:19:18 --> Controller Class Initialized
DEBUG - 2015-02-10 00:19:18 --> Helper loaded: url_helper
DEBUG - 2015-02-10 00:19:18 --> Encrypt Class Initialized
DEBUG - 2015-02-10 00:19:18 --> Session Class Initialized
DEBUG - 2015-02-10 00:19:18 --> Helper loaded: string_helper
DEBUG - 2015-02-10 00:19:18 --> Encrypt class already loaded. Second attempt ignored.
DEBUG - 2015-02-10 00:19:18 --> Session routines successfully run
DEBUG - 2015-02-10 00:19:18 --> Session class already loaded. Second attempt ignored.
DEBUG - 2015-02-10 00:19:18 --> Config file loaded: application/config/self_config.php
DEBUG - 2015-02-10 00:19:18 --> Model Class Initialized
DEBUG - 2015-02-10 00:19:18 --> Database Driver Class Initialized
DEBUG - 2015-02-10 00:19:18 --> Self_function class already loaded. Second attempt ignored.
DEBUG - 2015-02-10 00:19:18 --> Self_function class already loaded. Second attempt ignored.
DEBUG - 2015-02-10 00:19:18 --> Self_function class already loaded. Second attempt ignored.
DEBUG - 2015-02-10 00:19:18 --> inside set_student
DEBUG - 2015-02-10 00:19:18 --> count(assign_id) as count
                    from assignment
                    where class = 9 and
                    (
                        section = 'A' or section = 'Z'
                    ) and
                    cat_id= 1 and
                    assign_id not in
                        (
                            select assign_id
                            from assign_seen_student
                            where student_id = 6
                        )
DEBUG - 2015-02-10 00:19:18 --> count(assign_id) as count
                    from assignment
                    where class = 9 and
                    (
                        section = 'A' or section = 'Z'
                    ) and
                    cat_id= 2 and
                    assign_id not in
                        (
                            select assign_id
                            from assign_seen_student
                            where student_id = 6
                        )
DEBUG - 2015-02-10 00:19:18 --> count(assign_id) as count
                    from assignment
                    where class = 9 and
                    (
                        section = 'A' or section = 'Z'
                    ) and
                    cat_id= 3 and
                    assign_id not in
                        (
                            select assign_id
                            from assign_seen_student
                            where student_id = 6
                        )
DEBUG - 2015-02-10 00:19:18 --> count(assign_id) as count
                    from assignment
                    where class = 9 and
                    (
                        section = 'A' or section = 'Z'
                    ) and
                    cat_id= 4 and
                    assign_id not in
                        (
                            select assign_id
                            from assign_seen_student
                            where student_id = 6
                        )
DEBUG - 2015-02-10 00:19:18 --> count(assign_id) as count
                    from assignment
                    where class = 9 and
                    (
                        section = 'A' or section = 'Z'
                    ) and
                    cat_id= 5 and
                    assign_id not in
                        (
                            select assign_id
                            from assign_seen_student
                            where student_id = 6
                        )
DEBUG - 2015-02-10 00:19:18 --> model:get_notice= txt, utc_in from notice where (class=0 or (class=9 and(section = 'Z' or section='A'))) and UNIX_TIMESTAMP() < utc_valid
DEBUG - 2015-02-10 00:19:18 --> File loaded: application/views/header.php
DEBUG - 2015-02-10 00:19:18 --> File loaded: application/views/home.php
DEBUG - 2015-02-10 00:19:18 --> File loaded: application/views/footer.php
DEBUG - 2015-02-10 00:19:18 --> Final output sent to browser
DEBUG - 2015-02-10 00:19:18 --> Total execution time: 0.1177
DEBUG - 2015-02-10 00:19:23 --> Config Class Initialized
DEBUG - 2015-02-10 00:19:23 --> Hooks Class Initialized
DEBUG - 2015-02-10 00:19:23 --> Utf8 Class Initialized
DEBUG - 2015-02-10 00:19:23 --> UTF-8 Support Disabled
DEBUG - 2015-02-10 00:19:23 --> URI Class Initialized
DEBUG - 2015-02-10 00:19:23 --> Router Class Initialized
DEBUG - 2015-02-10 00:19:23 --> Output Class Initialized
DEBUG - 2015-02-10 00:19:23 --> Security Class Initialized
DEBUG - 2015-02-10 00:19:23 --> Input Class Initialized
DEBUG - 2015-02-10 00:19:23 --> Global POST and COOKIE data sanitized
DEBUG - 2015-02-10 00:19:23 --> Language Class Initialized
DEBUG - 2015-02-10 00:19:23 --> Loader Class Initialized
DEBUG - 2015-02-10 00:19:23 --> Controller Class Initialized
DEBUG - 2015-02-10 00:19:23 --> Helper loaded: url_helper
DEBUG - 2015-02-10 00:19:23 --> Encrypt Class Initialized
DEBUG - 2015-02-10 00:19:23 --> Session Class Initialized
DEBUG - 2015-02-10 00:19:23 --> Helper loaded: string_helper
DEBUG - 2015-02-10 00:19:23 --> Encrypt class already loaded. Second attempt ignored.
DEBUG - 2015-02-10 00:19:23 --> Session routines successfully run
DEBUG - 2015-02-10 00:19:23 --> Model Class Initialized
DEBUG - 2015-02-10 00:19:23 --> Database Driver Class Initialized
DEBUG - 2015-02-10 00:19:23 --> Config file loaded: application/config/self_config.php
DEBUG - 2015-02-10 00:19:23 --> Session class already loaded. Second attempt ignored.
DEBUG - 2015-02-10 00:19:23 --> Services:index=English
DEBUG - 2015-02-10 00:19:23 --> 1 = English
DEBUG - 2015-02-10 00:19:23 --> File loaded: application/views/header.php
DEBUG - 2015-02-10 00:19:23 --> File loaded: application/views/services.php
DEBUG - 2015-02-10 00:19:23 --> File loaded: application/views/footer_service.php
DEBUG - 2015-02-10 00:19:23 --> Final output sent to browser
DEBUG - 2015-02-10 00:19:23 --> Total execution time: 0.0468
DEBUG - 2015-02-10 00:23:48 --> Config Class Initialized
DEBUG - 2015-02-10 00:23:48 --> Hooks Class Initialized
DEBUG - 2015-02-10 00:23:48 --> Utf8 Class Initialized
DEBUG - 2015-02-10 00:23:48 --> UTF-8 Support Disabled
DEBUG - 2015-02-10 00:23:48 --> URI Class Initialized
DEBUG - 2015-02-10 00:23:48 --> Router Class Initialized
DEBUG - 2015-02-10 00:23:48 --> Output Class Initialized
DEBUG - 2015-02-10 00:23:48 --> Security Class Initialized
DEBUG - 2015-02-10 00:23:48 --> Input Class Initialized
DEBUG - 2015-02-10 00:23:48 --> Global POST and COOKIE data sanitized
DEBUG - 2015-02-10 00:23:48 --> Language Class Initialized
DEBUG - 2015-02-10 00:23:48 --> Loader Class Initialized
DEBUG - 2015-02-10 00:23:48 --> Controller Class Initialized
DEBUG - 2015-02-10 00:23:48 --> Helper loaded: url_helper
DEBUG - 2015-02-10 00:23:48 --> Encrypt Class Initialized
DEBUG - 2015-02-10 00:23:48 --> Session Class Initialized
DEBUG - 2015-02-10 00:23:48 --> Helper loaded: string_helper
DEBUG - 2015-02-10 00:23:48 --> Encrypt class already loaded. Second attempt ignored.
DEBUG - 2015-02-10 00:23:48 --> Session routines successfully run
DEBUG - 2015-02-10 00:23:48 --> Model Class Initialized
DEBUG - 2015-02-10 00:23:48 --> Database Driver Class Initialized
DEBUG - 2015-02-10 00:23:48 --> Config file loaded: application/config/self_config.php
DEBUG - 2015-02-10 00:23:48 --> Session class already loaded. Second attempt ignored.
DEBUG - 2015-02-10 00:23:48 --> Services:index=English
DEBUG - 2015-02-10 00:23:48 --> 1 = English
DEBUG - 2015-02-10 00:23:48 --> File loaded: application/views/header.php
DEBUG - 2015-02-10 00:23:48 --> File loaded: application/views/services.php
DEBUG - 2015-02-10 00:23:48 --> File loaded: application/views/footer_service.php
DEBUG - 2015-02-10 00:23:48 --> Final output sent to browser
DEBUG - 2015-02-10 00:23:48 --> Total execution time: 0.1008
DEBUG - 2015-02-10 00:23:53 --> Config Class Initialized
DEBUG - 2015-02-10 00:23:53 --> Hooks Class Initialized
DEBUG - 2015-02-10 00:23:53 --> Utf8 Class Initialized
DEBUG - 2015-02-10 00:23:53 --> UTF-8 Support Disabled
DEBUG - 2015-02-10 00:23:53 --> URI Class Initialized
DEBUG - 2015-02-10 00:23:53 --> Router Class Initialized
DEBUG - 2015-02-10 00:23:53 --> Output Class Initialized
DEBUG - 2015-02-10 00:23:53 --> Security Class Initialized
DEBUG - 2015-02-10 00:23:53 --> Input Class Initialized
DEBUG - 2015-02-10 00:23:53 --> Global POST and COOKIE data sanitized
DEBUG - 2015-02-10 00:23:53 --> Language Class Initialized
DEBUG - 2015-02-10 00:23:53 --> Loader Class Initialized
DEBUG - 2015-02-10 00:23:53 --> Controller Class Initialized
DEBUG - 2015-02-10 00:23:53 --> Helper loaded: url_helper
DEBUG - 2015-02-10 00:23:53 --> Encrypt Class Initialized
DEBUG - 2015-02-10 00:23:53 --> Session Class Initialized
DEBUG - 2015-02-10 00:23:53 --> Helper loaded: string_helper
DEBUG - 2015-02-10 00:23:53 --> Encrypt class already loaded. Second attempt ignored.
DEBUG - 2015-02-10 00:23:53 --> Session routines successfully run
DEBUG - 2015-02-10 00:23:53 --> Session class already loaded. Second attempt ignored.
DEBUG - 2015-02-10 00:23:53 --> Config file loaded: application/config/self_config.php
DEBUG - 2015-02-10 00:23:53 --> Model Class Initialized
DEBUG - 2015-02-10 00:23:53 --> Database Driver Class Initialized
DEBUG - 2015-02-10 00:23:53 --> Self_function class already loaded. Second attempt ignored.
DEBUG - 2015-02-10 00:23:53 --> Self_function class already loaded. Second attempt ignored.
DEBUG - 2015-02-10 00:23:53 --> Self_function class already loaded. Second attempt ignored.
DEBUG - 2015-02-10 00:23:53 --> inside set_student
DEBUG - 2015-02-10 00:23:53 --> count(assign_id) as count
                    from assignment
                    where class = 9 and
                    (
                        section = 'A' or section = 'Z'
                    ) and
                    cat_id= 1 and
                    assign_id not in
                        (
                            select assign_id
                            from assign_seen_student
                            where student_id = 6
                        )
DEBUG - 2015-02-10 00:23:53 --> count(assign_id) as count
                    from assignment
                    where class = 9 and
                    (
                        section = 'A' or section = 'Z'
                    ) and
                    cat_id= 2 and
                    assign_id not in
                        (
                            select assign_id
                            from assign_seen_student
                            where student_id = 6
                        )
DEBUG - 2015-02-10 00:23:53 --> count(assign_id) as count
                    from assignment
                    where class = 9 and
                    (
                        section = 'A' or section = 'Z'
                    ) and
                    cat_id= 3 and
                    assign_id not in
                        (
                            select assign_id
                            from assign_seen_student
                            where student_id = 6
                        )
DEBUG - 2015-02-10 00:23:53 --> count(assign_id) as count
                    from assignment
                    where class = 9 and
                    (
                        section = 'A' or section = 'Z'
                    ) and
                    cat_id= 4 and
                    assign_id not in
                        (
                            select assign_id
                            from assign_seen_student
                            where student_id = 6
                        )
DEBUG - 2015-02-10 00:23:53 --> count(assign_id) as count
                    from assignment
                    where class = 9 and
                    (
                        section = 'A' or section = 'Z'
                    ) and
                    cat_id= 5 and
                    assign_id not in
                        (
                            select assign_id
                            from assign_seen_student
                            where student_id = 6
                        )
DEBUG - 2015-02-10 00:23:53 --> model:get_notice= txt, utc_in from notice where (class=0 or (class=9 and(section = 'Z' or section='A'))) and UNIX_TIMESTAMP() < utc_valid
DEBUG - 2015-02-10 00:23:53 --> File loaded: application/views/header.php
DEBUG - 2015-02-10 00:23:53 --> File loaded: application/views/home.php
DEBUG - 2015-02-10 00:23:53 --> File loaded: application/views/footer.php
DEBUG - 2015-02-10 00:23:53 --> Final output sent to browser
DEBUG - 2015-02-10 00:23:53 --> Total execution time: 0.0813
