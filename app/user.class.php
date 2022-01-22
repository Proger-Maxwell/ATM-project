<?php class User {

    private $db;

    public function __construct($db) {
        $this->db=$db;
    }

    function login($bill_num, $pin) {

        $params=[ 'bill_number'=>$bill_num];

        $data=$this->db->query('SELECT * FROM users WHERE bill_number = :bill_number', $params);

        if($data) {
            if (password_verify($pin, $data['0']['hash'])) {
                $data=$this->db->query('SELECT name, surname, bill_number, balance FROM users WHERE bill_number = :bill_number', $params);
                return $data[0];
            }

            else {
                return array('error'=> '__false_login_data'
                );
            }
        }

        else {
            return array('error'=> '__card_not_found'
            );
        }
    }

    function register($name, $surname, $bill_num, $pin) {

        $params=[ 'bill_number'=>$bill_num];

        $data=$this->db->query('SELECT name, surname, bill_number FROM users WHERE bill_number = :bill_number', $params);

        if( !$data) {
            $hash=password_hash($pin, PASSWORD_DEFAULT);
            $new_params=[ 'name'=>$name,
            'surname'=>$surname,
            'bill_number'=>$bill_num,
            'hash'=>$hash];
            $this->db->query('INSERT INTO `users` ( name, surname, bill_number, hash ) VALUES ( :name, :surname, :bill_number, :hash )', $new_params);
            $data=$this->db->query('SELECT id FROM users WHERE bill_number = :bill_number', $params);
        }

        ;
        return $data[0];
    }

    function getUserData($bill_num) {

        $params=[ 'bill_number'=>$bill_num];

        $data=$this->db->query('SELECT name, surname, bill_number, balance FROM users WHERE bill_number = :bill_number', $params);

        return $data[0];
    }

    function changePass($bill_num, $pin, $new_pin) {

        $params=[ 'bill_number'=>$bill_num];

        $data=$this->db->query('SELECT * FROM users WHERE bill_number = :bill_number', $params);

        if($data) {
            if (password_verify($pin, $data['0']['hash'])) {
                $hash=password_hash($new_pin, PASSWORD_DEFAULT);
                $new_params=[ 'bill_number'=>$bill_num,
                'hash'=>$hash];
                $this->db->query('UPDATE users SET hash = :hash WHERE bill_number = :bill_number', $new_params);
            }

            else {
                return array('error'=> '__false_pin_data'
                );
            }
        }

        return array('error'=> '__bank_troubles'
        );
    }

    function addMoney($bill_num, $money) {

        $params=[ 'bill_number'=>$bill_num];

        $data=$this->db->query('SELECT balance FROM users WHERE bill_number = :bill_number', $params);

        $new_params=[ 'bill_number'=>$bill_num,
        'balance'=>$data[0]['balance']+$money,
        ];
        $this->db->query('UPDATE users SET balance = :balance WHERE bill_number = :bill_number', $new_params);

    }

    function getMoney($bill_num, $money) {

        $params=[ 'bill_number'=>$bill_num];

        $data=$this->db->query('SELECT balance FROM users WHERE bill_number = :bill_number', $params);

        if($data[0]['balance'] < $money) {
            return array('error'=> '__lack_funds'
            );
        }

        else {
            $new_params=[ 'bill_number'=>$bill_num,
            'balance'=>$data[0]['balance'] - $money,
            ];
            $this->db->query('UPDATE users SET balance = :balance WHERE bill_number = :bill_number', $new_params);
        }
    }

    function sendMoney($bill_num, $target_bill_numder, $money) {

        $params=[ 'bill_number'=>$bill_num,
        ];

        $data=$this->db->query('SELECT balance FROM users WHERE bill_number = :bill_number', $params);

        if($data) {
            $target_params=[ 'target_bill_number'=>$target_bill_numder,
            ];
            $target_data=$this->db->query('SELECT balance FROM users WHERE bill_number = :target_bill_number', $target_params);

            if($target_data) {

                if($data[0]['balance'] < $money) {
                    return array('error'=> '__lack_funds'
                    );
                }

                else {
                    $input_params=[ 'balance'=>$data[0]['balance'] - $money,
                    'bill_number'=>$bill_num,
                    ];

                    $this->db->query('UPDATE users SET balance = :balance WHERE bill_number = :bill_number', $input_params);

                    $input_target_params=[ 'target_balance'=>$target_data[0]['balance']+$money,
                    'target_bill_number'=>$target_bill_numder];

                    $this->db->query('UPDATE users SET balance = :target_balance WHERE bill_number = :target_bill_number', $input_target_params);
                }


            }

            else {
                return array('error'=> '__bank_troubles'
                );
            }

        }

        else {
            return array('error'=> '__bank_troubles'
            );
        }
    }

}