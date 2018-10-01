<?php
/**
 * Created by PhpStorm.
 * User: skat
 * Date: 01.10.18
 * Time: 13:33
 */

namespace console\controllers;
use backend\modules\behance\models\BehanceOption;
use Yii;
use yii\console\Controller;
use backend\modules\behance\models\BehanceWork;
use backend\modules\behance\models\Proxy;
use yii\helpers\Console;

class BehanceController extends Controller
{

    private $user_agents = [
        'Mozilla/5.0 (Windows; U; Windows NT 6.1; tr-TR) AppleWebKit/533.20.25 (KHTML, like Gecko) Version/5.0.4 Safari/533.20.27',
        'Opera/9.80 (X11; Linux i686; Ubuntu/14.10) Presto/2.12.388 Version/12.16',
        'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2228.0 Safari/537.36',
        'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:40.0) Gecko/20100101 Firefox/40.1',
    ];

    public function actionLike()
    {
        $likes = BehanceOption::find()->where('name="max_likes"')->one();
        $likes = $likes->value;

        $work_ids = BehanceWork::find()->asArray()->select("id")->column();
        $proxy_ids = Proxy::find()->asArray()->select("id")->column();

        for($i=0; $i<$likes; $i++)
        {
           $work_id = $work_ids[rand(0,count($work_ids)-1)];//случайный id  работы
           $work = BehanceWork::find()->where("id=".$work_id)->one();//получаем работу

           $this->stdout("Лайкаем работу: ".$work->url."\n", Console::FG_GREEN);

           $work_url = $work->url;
           $account_url = $work->account['url'];

           //берем случайный proxy ip из таблицы
           $proxy_id = $proxy_ids[rand(0,count($proxy_ids))];
           $proxy = Proxy::find()->where("id=".$proxy_id)->one();

           //выбираем случайный юзерагент
           $user_agent = $this->user_agents[rand(0,3)];

           $behance_id = explode("/",$work->url)[4];
           $like_url =  "https://www.behance.net/v2/projects/".$behance_id."/appreciate?client_id=BehanceWebSusi1";

           $this->LikeWork($work_url,$account_url,$proxy->ip,$user_agent,$like_url);

        }


    }

    private function LikeWork($work_url,$account_url,$proxy,$user_agent,$like_url)
    {

            $curl = curl_init();

            curl_setopt($curl, CURLOPT_URL, $account_url);
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($curl, CURLOPT_HEADER, true);
            curl_setopt($curl,  CURLOPT_PROXY, $proxy);
            curl_setopt($curl, CURLOPT_USERAGENT, $user_agent);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_exec($curl);
            $error = curl_error($curl)." ".curl_errno($curl);

            curl_setopt($curl, CURLOPT_URL, $work_url);
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($curl, CURLOPT_HEADER, true);
            curl_setopt($curl,  CURLOPT_PROXY, $proxy);
            curl_setopt($curl, CURLOPT_REFERER, $account_url);
            curl_setopt($curl, CURLOPT_USERAGENT, $user_agent);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_exec($curl);
            $error = curl_error($curl)." ".curl_errno($curl);

            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_URL,$like_url);
            curl_setopt($curl,  CURLOPT_PROXY, $proxy);
            curl_setopt($curl,CURLOPT_USERAGENT, $user_agent);
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_HEADER, 1);
            $res = curl_exec($curl);

            $error = curl_error($curl)." ".curl_errno($curl);

            curl_close($curl);

            if(empty($error))
                $this->stdout($res."\n", Console::FG_GREEN);
            else
                $this->stdout($error."\n", Console::FG_RED);

    }
}