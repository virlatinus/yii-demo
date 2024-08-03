<?php

namespace console\controllers;

use yii\console\Controller;
use yii\console\widgets\Table;
use yii\helpers\BaseConsole as Console;

class HelloController extends Controller
{
    public $message = 'Hello World!';

    public function options($actionID)
    {
        return ['message'];
    }

    public function optionAliases()
    {
        return ['m' => 'message'];
    }

    public function actionIndex()
    {
        $name = $this->ansiFormat('Yii', Console::FG_YELLOW);
        echo "Hello, my name is $name.\n";
        $this->stdout($this->message . "\n", Console::BOLD);
    }

    /**
     * @throws \Throwable
     */
    public function actionTable() {
        echo Table::widget([
            'headers' => ['Project', 'Status', 'Participant'],
            'rows' => [
                ['Yii', 'OK', '@samdark'],
                ['Yii', 'OK', '@cebe'],
            ],
        ]);
    }
}
