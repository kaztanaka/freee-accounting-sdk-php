<?php
/**
 * UpdateCompanyParams
 *
 * PHP version 5
 *
 * @category Class
 * @package  Freee\Accounting
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * freee API
 *
 * <h1 id=\"freee_api\">freee API</h1> <hr /> <h2 id=\"\">スタートガイド</h2> <p>1. セットアップ</p> <ol> <ul><li><a href=\"https://support.freee.co.jp/hc/ja/articles/202847230\" class=\"external-link\" rel=\"nofollow\">freeeアカウント（無料）</a>を<a href=\"https://secure.freee.co.jp/users/sign_up\" class=\"external-link\" rel=\"nofollow\">作成</a>します（すでにお持ちの場合は次へ）</li><li><a href=\"https://app.secure.freee.co.jp/developers/demo_companies/description\" class=\"external-link\" rel=\"nofollow\">開発者向け事業所・環境を作成</a>します</li><li><span><a href=\"https://app.secure.freee.co.jp/developers/applications\" class=\"external-link\" rel=\"nofollow\">前のステップで作成した事業所を選択してfreeeアプリを追加</a>します</span></li><li>Client IDをCopyしておきます</li> </ul> </ol>  <p>2. 実際にAPIを叩いてみる（ブラウザからAPIのレスポンスを確認する）</p> <ol> <ul><li><span><span>以下のURLの●をclient_idに入れ替えて<a href=\"https://app.secure.freee.co.jp/developers/tutorials/3-%E3%82%A2%E3%82%AF%E3%82%BB%E3%82%B9%E3%83%88%E3%83%BC%E3%82%AF%E3%83%B3%E3%82%92%E5%8F%96%E5%BE%97%E3%81%99%E3%82%8B#%E8%AA%8D%E5%8F%AF%E3%82%B3%E3%83%BC%E3%83%89%E3%82%92%E5%8F%96%E5%BE%97%E3%81%99%E3%82%8B\" class=\"external-link\" rel=\"nofollow\">アクセストークンを取得</a>します</span></span><ul><li><span><span><pre><code>https://accounts.secure.freee.co.jp/public_api/authorize?client_id=●&amp;redirect_uri=urn%3Aietf%3Awg%3Aoauth%3A2.0%3Aoob&amp;response_type=token</a></code></pre></span></span></li></ul></li><li><span><a href=\"https://developer.freee.co.jp/docs/accounting/reference#/%E9%80%A3%E7%B5%A1%E5%85%88\" class=\"external-link\" rel=\"nofollow\">APIリファレンス</a>で<code>Authorize</code>を押下します</span></li><li><span>アクセストークン<span><span>を入力して</span></span>&nbsp;もう一度<span><code>Authorize</code>を押下して<code>Close</code>を押下します</span></span></li><li>リファレンス内のCompanies（事業所）に移動し、<code>Try it out</code>を押下し、<code>Execute</code>を押下します</li><li>Response bodyを参照し、事業所ID(id属性)を活用して、Companies以外のエンドポイントでどのようなデータのやりとりできるのか確認します</li></ul> </ol> <p>3. 連携を実装する</p> <ol> <ul><li><a href=\"https://developer.freee.co.jp/tips\" class=\"external-link\" rel=\"nofollow\">API TIPS</a>を参考に、ユースケースごとの連携の概要を学びます。<span>例えば</span><span>&nbsp;</span><a href=\"https://developer.freee.co.jp/tips/how-to-cooperate-salesmanegement-system\" class=\"external-link\" rel=\"nofollow\">SFA、CRM、販売管理システムから会計freeeへの連携</a>や<a href=\"https://developer.freee.co.jp/tips/how-to-cooperate-excel-and-spreadsheet\" class=\"external-link\" rel=\"nofollow\">エクセルやgoogle spreadsheetからの連携</a>です</li><li>実利用向け事業所がすでにある場合は利用、ない場合は作成します（セットアップで作成したのは開発者向け環境のため活用不可）</li><li><a href=\"https://developer.freee.co.jp/docs/accounting/reference\" class=\"external-link\" rel=\"nofollow\">API documentation</a><span>&nbsp;を参照し、躓いた場合は</span><span>&nbsp;</span><a href=\"https://developer.freee.co.jp/community/forum/community\" class=\"external-link\" rel=\"nofollow\">Community</a><span>&nbsp;で質問してみましょう</span></li></ul> </ol> <p>アプリケーションの登録方法や認証方法、またはAPIの活用方法でご不明な点がある場合は<a href=\"https://support.freee.co.jp/hc/ja/sections/115000030743\">ヘルプセンター</a>もご確認ください</p> <hr /> <h2 id=\"_2\">仕様</h2>  <h3 id=\"api\">APIエンドポイント</h3>  <p>https://api.freee.co.jp/ (httpsのみ)</p>  <h3 id=\"_3\">認証方式</h3>  <p><a href=\"http://tools.ietf.org/html/rfc6749\">OAuth2</a>に対応</p>  <ul> <li>Authorization Code Flow (Webアプリ向け)</li>  <li>Implicit Flow (Mobileアプリ向け)</li> </ul>  <h3 id=\"_4\">認証エンドポイント</h3>  <p>https://accounts.secure.freee.co.jp/</p>  <ul> <li>authorize : https://accounts.secure.freee.co.jp/public_api/authorize</li>  <li>token : https://accounts.secure.freee.co.jp/public_api/token</li> </ul>  <h3 id=\"_5\">アクセストークンのリフレッシュ</h3>  <p>認証時に得たrefresh_token を使ってtoken の期限をリフレッシュして新規に発行することが出来ます。</p>  <p>grant_type=refresh_token で https://accounts.secure.freee.co.jp/public_api/token にアクセスすればリフレッシュされます。</p>  <p>e.g.)</p>  <p>POST: https://accounts.secure.freee.co.jp/public_api/token</p>  <p>params: grant_type=refresh_token&amp;client_id=UID&amp;client_secret=SECRET&amp;refresh_token=REFRESH_TOKEN</p>  <p>詳細は<a href=\"https://github.com/applicake/doorkeeper/wiki/Enable-Refresh-Token-Credentials#flow\">refresh_token</a>を参照下さい。</p>  <h3 id=\"_6\">アクセストークンの破棄</h3>  <p>認証時に得たaccess_tokenまたはrefresh_tokenを使って、tokenを破棄することができます。 token=access_tokenまたはtoken=refresh_tokenでhttps://accounts.secure.freee.co.jp/public_api/revokeにアクセスすると破棄されます。token_type_hintでaccess_tokenまたはrefresh_tokenを陽に指定できます。</p>  <p>e.g.)</p>  <p>POST: https://accounts.secure.freee.co.jp/public_api/revoke</p>  <p>params: token=ACCESS_TOKEN</p>  <p>または</p>  <p>params: token=REFRESH_TOKEN</p>  <p>または</p>  <p>params: token=ACCESS_TOKEN&amp;token_type_hint=access_token</p>  <p>または</p>  <p>params: token=REFRESH_TOKEN&amp;token_type_hint=refresh_token</p>  <p>詳細は <a href=\"https://tools.ietf.org/html/rfc7009\">OAuth 2.0 Token revocation</a> をご参照ください。</p>  <h3 id=\"_7\">データフォーマット</h3>  <p>リクエスト、レスポンスともにJSON形式をサポート</p>  <h3 id=\"_8\">共通レスポンスヘッダー</h3>  <p>すべてのAPIのレスポンスには以下のHTTPヘッダーが含まれます。</p>  <ul> <li> <p>X-Freee-Request-ID</p> <ul> <li>各リクエスト毎に発行されるID</li> </ul> </li> </ul>  <h3 id=\"_9\">共通エラーレスポンス</h3>  <ul> <li> <p>ステータスコードはレスポンス内のJSONに含まれる他、HTTPヘッダにも含まれる</p> </li>  <li> <p>type</p>  <ul> <li>status : HTTPステータスコードの説明</li>  <li>validation : エラーの詳細の説明（開発者向け）</li> </ul> </li> </ul>  <p>レスポンスの例</p>  <pre><code>  {     &quot;status_code&quot; : 400,     &quot;errors&quot; : [       {         &quot;type&quot; : &quot;status&quot;,         &quot;messages&quot; : [&quot;不正なリクエストです。&quot;]       },       {         &quot;type&quot; : &quot;validation&quot;,         &quot;messages&quot; : [&quot;Date は不正な日付フォーマットです。入力例：2013-01-01&quot;]       }     ]   }</code></pre> <hr /> <h2 id=\"_10\">連絡先</h2>  <p>ご不明点、ご要望等は <a href=\"https://support.freee.co.jp/hc/ja/requests/new\">freee サポートデスクへのお問い合わせフォーム</a> からご連絡ください。</p> <hr />&copy; Since 2013 freee K.K.
 *
 * The version of the OpenAPI document: v1.0
 * 
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 4.1.3
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Freee\Accounting\Model;

use \ArrayAccess;
use \Freee\Accounting\ObjectSerializer;

/**
 * UpdateCompanyParams Class Doc Comment
 *
 * @category Class
 * @package  Freee\Accounting
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class UpdateCompanyParams implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'updateCompanyParams';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'name' => 'string',
        'name_kana' => 'string',
        'contact_name' => 'string',
        'address_attributes' => '\Freee\Accounting\Model\UpdateCompanyParamsAddressAttributes',
        'phone1' => 'string',
        'phone2' => 'string',
        'fax' => 'string',
        'sales_information_attributes' => '\Freee\Accounting\Model\UpdateCompanyParamsSalesInformationAttributes',
        'head_count' => 'float',
        'corporate_number' => 'string',
        'fiscal_years_attributes' => '\Freee\Accounting\Model\UpdateCompanyParamsFiscalYearsAttributes',
        'doc_template' => '\Freee\Accounting\Model\UpdateCompanyParamsDocTemplate',
        'txn_number_format' => 'string',
        'private_settlement' => 'int'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPIFormats = [
        'name' => null,
        'name_kana' => null,
        'contact_name' => null,
        'address_attributes' => null,
        'phone1' => null,
        'phone2' => null,
        'fax' => null,
        'sales_information_attributes' => null,
        'head_count' => null,
        'corporate_number' => null,
        'fiscal_years_attributes' => null,
        'doc_template' => null,
        'txn_number_format' => null,
        'private_settlement' => null
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'name' => 'name',
        'name_kana' => 'name_kana',
        'contact_name' => 'contact_name',
        'address_attributes' => 'address_attributes',
        'phone1' => 'phone1',
        'phone2' => 'phone2',
        'fax' => 'fax',
        'sales_information_attributes' => 'sales_information_attributes',
        'head_count' => 'head_count',
        'corporate_number' => 'corporate_number',
        'fiscal_years_attributes' => 'fiscal_years_attributes',
        'doc_template' => 'doc_template',
        'txn_number_format' => 'txn_number_format',
        'private_settlement' => 'private_settlement'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'name' => 'setName',
        'name_kana' => 'setNameKana',
        'contact_name' => 'setContactName',
        'address_attributes' => 'setAddressAttributes',
        'phone1' => 'setPhone1',
        'phone2' => 'setPhone2',
        'fax' => 'setFax',
        'sales_information_attributes' => 'setSalesInformationAttributes',
        'head_count' => 'setHeadCount',
        'corporate_number' => 'setCorporateNumber',
        'fiscal_years_attributes' => 'setFiscalYearsAttributes',
        'doc_template' => 'setDocTemplate',
        'txn_number_format' => 'setTxnNumberFormat',
        'private_settlement' => 'setPrivateSettlement'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'name' => 'getName',
        'name_kana' => 'getNameKana',
        'contact_name' => 'getContactName',
        'address_attributes' => 'getAddressAttributes',
        'phone1' => 'getPhone1',
        'phone2' => 'getPhone2',
        'fax' => 'getFax',
        'sales_information_attributes' => 'getSalesInformationAttributes',
        'head_count' => 'getHeadCount',
        'corporate_number' => 'getCorporateNumber',
        'fiscal_years_attributes' => 'getFiscalYearsAttributes',
        'doc_template' => 'getDocTemplate',
        'txn_number_format' => 'getTxnNumberFormat',
        'private_settlement' => 'getPrivateSettlement'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$openAPIModelName;
    }

    const TXN_NUMBER_FORMAT_NOT_USED = 'not_used';
    const TXN_NUMBER_FORMAT_DIGITS = 'digits';
    const TXN_NUMBER_FORMAT_ALNUM = 'alnum';
    

    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getTxnNumberFormatAllowableValues()
    {
        return [
            self::TXN_NUMBER_FORMAT_NOT_USED,
            self::TXN_NUMBER_FORMAT_DIGITS,
            self::TXN_NUMBER_FORMAT_ALNUM,
        ];
    }
    

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['name_kana'] = isset($data['name_kana']) ? $data['name_kana'] : null;
        $this->container['contact_name'] = isset($data['contact_name']) ? $data['contact_name'] : null;
        $this->container['address_attributes'] = isset($data['address_attributes']) ? $data['address_attributes'] : null;
        $this->container['phone1'] = isset($data['phone1']) ? $data['phone1'] : null;
        $this->container['phone2'] = isset($data['phone2']) ? $data['phone2'] : null;
        $this->container['fax'] = isset($data['fax']) ? $data['fax'] : null;
        $this->container['sales_information_attributes'] = isset($data['sales_information_attributes']) ? $data['sales_information_attributes'] : null;
        $this->container['head_count'] = isset($data['head_count']) ? $data['head_count'] : null;
        $this->container['corporate_number'] = isset($data['corporate_number']) ? $data['corporate_number'] : null;
        $this->container['fiscal_years_attributes'] = isset($data['fiscal_years_attributes']) ? $data['fiscal_years_attributes'] : null;
        $this->container['doc_template'] = isset($data['doc_template']) ? $data['doc_template'] : null;
        $this->container['txn_number_format'] = isset($data['txn_number_format']) ? $data['txn_number_format'] : null;
        $this->container['private_settlement'] = isset($data['private_settlement']) ? $data['private_settlement'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if (!is_null($this->container['head_count']) && ($this->container['head_count'] > 7)) {
            $invalidProperties[] = "invalid value for 'head_count', must be smaller than or equal to 7.";
        }

        if (!is_null($this->container['head_count']) && ($this->container['head_count'] < 0)) {
            $invalidProperties[] = "invalid value for 'head_count', must be bigger than or equal to 0.";
        }

        $allowedValues = $this->getTxnNumberFormatAllowableValues();
        if (!is_null($this->container['txn_number_format']) && !in_array($this->container['txn_number_format'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'txn_number_format', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        if (!is_null($this->container['private_settlement']) && ($this->container['private_settlement'] > 1)) {
            $invalidProperties[] = "invalid value for 'private_settlement', must be smaller than or equal to 1.";
        }

        if (!is_null($this->container['private_settlement']) && ($this->container['private_settlement'] < 0)) {
            $invalidProperties[] = "invalid value for 'private_settlement', must be bigger than or equal to 0.";
        }

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets name
     *
     * @return string|null
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param string|null $name 事業所の正式名称 (100文字以内)
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets name_kana
     *
     * @return string|null
     */
    public function getNameKana()
    {
        return $this->container['name_kana'];
    }

    /**
     * Sets name_kana
     *
     * @param string|null $name_kana 正式名称フリガナ (100文字以内)
     *
     * @return $this
     */
    public function setNameKana($name_kana)
    {
        $this->container['name_kana'] = $name_kana;

        return $this;
    }

    /**
     * Gets contact_name
     *
     * @return string|null
     */
    public function getContactName()
    {
        return $this->container['contact_name'];
    }

    /**
     * Sets contact_name
     *
     * @param string|null $contact_name user1
     *
     * @return $this
     */
    public function setContactName($contact_name)
    {
        $this->container['contact_name'] = $contact_name;

        return $this;
    }

    /**
     * Gets address_attributes
     *
     * @return \Freee\Accounting\Model\UpdateCompanyParamsAddressAttributes|null
     */
    public function getAddressAttributes()
    {
        return $this->container['address_attributes'];
    }

    /**
     * Sets address_attributes
     *
     * @param \Freee\Accounting\Model\UpdateCompanyParamsAddressAttributes|null $address_attributes address_attributes
     *
     * @return $this
     */
    public function setAddressAttributes($address_attributes)
    {
        $this->container['address_attributes'] = $address_attributes;

        return $this;
    }

    /**
     * Gets phone1
     *
     * @return string|null
     */
    public function getPhone1()
    {
        return $this->container['phone1'];
    }

    /**
     * Sets phone1
     *
     * @param string|null $phone1 電話番号１
     *
     * @return $this
     */
    public function setPhone1($phone1)
    {
        $this->container['phone1'] = $phone1;

        return $this;
    }

    /**
     * Gets phone2
     *
     * @return string|null
     */
    public function getPhone2()
    {
        return $this->container['phone2'];
    }

    /**
     * Sets phone2
     *
     * @param string|null $phone2 電話番号２
     *
     * @return $this
     */
    public function setPhone2($phone2)
    {
        $this->container['phone2'] = $phone2;

        return $this;
    }

    /**
     * Gets fax
     *
     * @return string|null
     */
    public function getFax()
    {
        return $this->container['fax'];
    }

    /**
     * Sets fax
     *
     * @param string|null $fax FAX
     *
     * @return $this
     */
    public function setFax($fax)
    {
        $this->container['fax'] = $fax;

        return $this;
    }

    /**
     * Gets sales_information_attributes
     *
     * @return \Freee\Accounting\Model\UpdateCompanyParamsSalesInformationAttributes|null
     */
    public function getSalesInformationAttributes()
    {
        return $this->container['sales_information_attributes'];
    }

    /**
     * Sets sales_information_attributes
     *
     * @param \Freee\Accounting\Model\UpdateCompanyParamsSalesInformationAttributes|null $sales_information_attributes sales_information_attributes
     *
     * @return $this
     */
    public function setSalesInformationAttributes($sales_information_attributes)
    {
        $this->container['sales_information_attributes'] = $sales_information_attributes;

        return $this;
    }

    /**
     * Gets head_count
     *
     * @return float|null
     */
    public function getHeadCount()
    {
        return $this->container['head_count'];
    }

    /**
     * Sets head_count
     *
     * @param float|null $head_count 従業員数（0: 経営者のみ、1: 2~5人、2: 6~10人、3: 11~20人、4: 21~30人、5: 31~40人、6: 41~100人、7: 100人以上
     *
     * @return $this
     */
    public function setHeadCount($head_count)
    {

        if (!is_null($head_count) && ($head_count > 7)) {
            throw new \InvalidArgumentException('invalid value for $head_count when calling UpdateCompanyParams., must be smaller than or equal to 7.');
        }
        if (!is_null($head_count) && ($head_count < 0)) {
            throw new \InvalidArgumentException('invalid value for $head_count when calling UpdateCompanyParams., must be bigger than or equal to 0.');
        }

        $this->container['head_count'] = $head_count;

        return $this;
    }

    /**
     * Gets corporate_number
     *
     * @return string|null
     */
    public function getCorporateNumber()
    {
        return $this->container['corporate_number'];
    }

    /**
     * Sets corporate_number
     *
     * @param string|null $corporate_number 法人番号 (半角数字13桁、法人のみ)
     *
     * @return $this
     */
    public function setCorporateNumber($corporate_number)
    {
        $this->container['corporate_number'] = $corporate_number;

        return $this;
    }

    /**
     * Gets fiscal_years_attributes
     *
     * @return \Freee\Accounting\Model\UpdateCompanyParamsFiscalYearsAttributes|null
     */
    public function getFiscalYearsAttributes()
    {
        return $this->container['fiscal_years_attributes'];
    }

    /**
     * Sets fiscal_years_attributes
     *
     * @param \Freee\Accounting\Model\UpdateCompanyParamsFiscalYearsAttributes|null $fiscal_years_attributes fiscal_years_attributes
     *
     * @return $this
     */
    public function setFiscalYearsAttributes($fiscal_years_attributes)
    {
        $this->container['fiscal_years_attributes'] = $fiscal_years_attributes;

        return $this;
    }

    /**
     * Gets doc_template
     *
     * @return \Freee\Accounting\Model\UpdateCompanyParamsDocTemplate|null
     */
    public function getDocTemplate()
    {
        return $this->container['doc_template'];
    }

    /**
     * Sets doc_template
     *
     * @param \Freee\Accounting\Model\UpdateCompanyParamsDocTemplate|null $doc_template doc_template
     *
     * @return $this
     */
    public function setDocTemplate($doc_template)
    {
        $this->container['doc_template'] = $doc_template;

        return $this;
    }

    /**
     * Gets txn_number_format
     *
     * @return string|null
     */
    public function getTxnNumberFormat()
    {
        return $this->container['txn_number_format'];
    }

    /**
     * Sets txn_number_format
     *
     * @param string|null $txn_number_format 仕訳番号形式（not_used: 使用しない、digits: 数字（例：5091824）、alnum: 英数字（例：59J0P））Available values : not_used, digits, alnum
     *
     * @return $this
     */
    public function setTxnNumberFormat($txn_number_format)
    {
        $allowedValues = $this->getTxnNumberFormatAllowableValues();
        if (!is_null($txn_number_format) && !in_array($txn_number_format, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'txn_number_format', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['txn_number_format'] = $txn_number_format;

        return $this;
    }

    /**
     * Gets private_settlement
     *
     * @return int|null
     */
    public function getPrivateSettlement()
    {
        return $this->container['private_settlement'];
    }

    /**
     * Sets private_settlement
     *
     * @param int|null $private_settlement プライベート資金/役員資金（0: 使用しない、1: 使用する）
     *
     * @return $this
     */
    public function setPrivateSettlement($private_settlement)
    {

        if (!is_null($private_settlement) && ($private_settlement > 1)) {
            throw new \InvalidArgumentException('invalid value for $private_settlement when calling UpdateCompanyParams., must be smaller than or equal to 1.');
        }
        if (!is_null($private_settlement) && ($private_settlement < 0)) {
            throw new \InvalidArgumentException('invalid value for $private_settlement when calling UpdateCompanyParams., must be bigger than or equal to 0.');
        }

        $this->container['private_settlement'] = $private_settlement;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }

    /**
     * Gets a header-safe presentation of the object
     *
     * @return string
     */
    public function toHeaderValue()
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


