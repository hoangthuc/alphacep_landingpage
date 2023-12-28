@extends('layouts.fe')

@section('title', 'Homepage')

@section('content')
<div id="hero">
    <div id="scrolldown"><span>SCROLL</span></div>
    <div id="online_counseling_desktop">
        <p><img src="{{ asset('fe/images/tip_close.png') }}" alt="" /></p>
        <div><img src="{{ asset('fe/images/pic_counseling_01.jpg') }}" alt="" /></div>
        <a href="contact.html">オンライン無料カウンセリング</a>
    </div>
    <div id="online_counseling_mobile"><a href="contact.html">まずはオンライン無料カウンセリング</a></div>
    <ul id="slider_desktop">
        <li class="slick-img">
            <p><img src="{{ asset('fe/images/hero_01_desktop.jpg') }}" alt="" /></p>
            <div class="hero_copy height_01">
                <div>
                    <h1>プロフェッショナルな表現で<br>
                        自分の思いを伝える</h1>
                    <p>例えば売上と利益についてプレゼンするとき<br>
                        <span>“Please look at the chart. Sales have slowly increased, and profits have dropped
                            sharply.”</span><br>
                        内容は伝わりますが、本当に伝えたいことでしょうか？<br>
                        One Month Programは一つ上のプロフェッショナルな英語力を鍛え、<br>
                        <span>“Looking at the sales trends, it's apparent that there has been a gradual increase in quarterly
                            figures. Conversely, profits have taken a significant plunge, which I see as an unusual
                            fluctuation.”</span><br>
                        と話せることを目指します。
                    </p>
                </div>
            </div>
        </li>
        <li class="slick-img">
            <p><img src="{{ asset('fe/images/hero_02_desktop.jpg') }}" alt="" /></p>
            <div class="hero_copy height_02">
                <div>
                    <h2>1ヶ月で身についた学習方法は一生もの</h2>
                    <p>実績ある学習方法も適切な教材で行われてこそ効果を発揮します。<br>
                        One Month Programのオリジナル教材は実際のビジネス英語を知っている<br>
                        通訳者による実践的な内容です。<br>
                        学習したことをすぐに仕事で活かすことで、定着を図ります。</p>
                </div>
            </div>
        </li>
        <li class="slick-img">
            <p><img src="{{ asset('fe/images/hero_03_desktop.jpg') }}" alt="" /></p>
            <div class="hero_copy height_02">
                <div>
                    <h2>英語をなんとなく聞いていませんか？</h2>
                    <p>言いたいことを十分に伝えられないのは<br>
                        英語を正しく聞き取れていないからかもしれません。<br>
                        なぜならば聞けない英語は話すことができないからです。<br>
                        発音が聞き取れないのか、表現を知らないのか、その両方なのか。<br>
                        弱点を見極めて強化することが必要です。</p>
                </div>
            </div>
        </li>
    </ul>
    <ul id="slider_mobile">
        <li class="slick-img"><img src="{{ asset('fe/images/hero_01_mobile.jpg') }}" alt="" /></li>
        <li class="slick-img"><img src="{{ asset('fe/images/hero_02_mobile.jpg') }}" alt="" /></li>
        <li class="slick-img"><img src="{{ asset('fe/images/hero_03_mobile.jpg') }}" alt="" /></li>
        <li class="slick-img"><img src="{{ asset('fe/images/hero_04_mobile.jpg') }}" alt="" /></li>
    </ul>
</div>


<div id="success_stories">
    <p class="title_1" data-delighter>Success Stories</p>
    <h2 id="user_voice" class="title_2" data-delighter>英会話力アップ・<br>目標達成したお客様の声</h2>
    <article id="stories_desktop">
        <section data-delighter>
            <p>重要な海外クライアントとの商談で、細かいニュアンスまで英語で伝えきることができました。</p>
            <span>受講コース：Masterコース<br>
                英語力の目安：TOEIC®900点以上</span>
        </section>
        <section data-delighter>
            <p>1ヶ月後に控えていた英語での面接では、内容だけでなく丁寧な英語表現もしっかりと準備したので、自信をもって臨めました。</p>
            <span>受講コース：Advancedコース<br>
                英語力の目安：TOEIC®700点以上 </span>
        </section>
        <section data-delighter>
            <p>ハイポテンシャル人材向けのトレーニングの一環として実施しました。会議での発言が増えたと外国人役員に好評です。</p>
            <span>受講コース：Advancedコース(法人向け)<br>
                英語力の目安：TOEIC®700点以上 </span>
        </section>
    </article>
    <ul id="stories_mobile">
        <li>
            <p>重要な海外クライアントとの商談で、細かいニュアンスまで英語で伝えきることができました。</p>
            <span>受講コース：Masterコース<br>
                英語力の目安：TOEIC®900点以上</span>
        </li>
        <li>
            <p>1ヶ月後に控えていた英語での面接では、内容だけでなく丁寧な英語表現もしっかりと準備したので、自信をもって臨めました。</p>
            <span>受講コース：Advancedコース<br>
                英語力の目安：TOEIC®700点以上 </span>
        </li>
        <li>
            <p>ハイポテンシャル人材向けのトレーニングの一環として実施しました。会議での発言が増えたと外国人役員に好評です。</p>
            <span>受講コース：Advancedコース(法人向け)<br>
                英語力の目安：TOEIC®700点以上 </span>
        </li>
    </ul>
    <small>※結果には個人差があり、効果を保証するものではありません。</small>
</div>


<div id="outline">
    <div data-delighter><img src="{{ asset('fe/images/pic_outline.jpg') }}" alt="" /></div>
    <div data-delighter>
        <p id="program_title" class="title_1">What is the One Month Program?</p>
        <h2 class="title_2">「One Month Program」とは？</h2>
        <h3>最短1ヶ月。海外出張・赴任前、プレゼン前、転職前など、短期間で英語力を上げたい方にピッタリのプログラムです。</h3>
        <p>「One Month
            Program」は、英語のプロフェッショナルである通訳者・翻訳者を9000名以上抱え、1,700社以上のグローバル企業に通訳・翻訳・語学サービスを提供してきた株式会社テンナイン・コミュニケーションが、英語のプロフェッショナル人材の育成経験を活かして独自開発した、ビジネスパーソン向けの1ヶ月短期集中英語パーソナルトレーニングプログラムです。
        </p>
    </div>
</div>


<div id="problem">
    <div>
        <p id="problem_list" class="title_1" data-delighter>What do you struggle with?</p>
        <h2 class="title_2" data-delighter>こんなお悩みありませんか？</h2>
        <ul>
            <li data-delighter>瞬時に言いたいことを英語で伝えられない</li>
            <li data-delighter>いつも同じフレーズで自分の意見を表現してしまう</li>
            <li data-delighter>英語をなんとなくしか理解していない気がする</li>
            <li data-delighter>オンラインになって英語の理解度が落ちた</li>
            <li data-delighter>言いたいことの50％くらいしか英語で表現できない</li>
            <li data-delighter>会議での早い議論に割り込めない</li>
            <li data-delighter>プレゼンは大丈夫だが質疑応答に対応できない</li>
        </ul>
    </div>
</div>


<div id="program">
    <div id="block_1">
        <div id="tips_1" data-delighter><img src="{{ asset('fe/images/tip_tagline.png') }}" alt="" /></div>
    </div>

    <div id="block_2" data-delighter>
        <div>
            <p>そのお悩み、最短1ヶ月で</p>
            <p>解決できます！</p>
        </div>
    </div>

    <h2 id="about" class="title_2" data-delighter>「ビジネスでの英語コミュニケーション力」に徹底してフォーカスした<br>
        「One Month Program」の特長</h2>

    <p id="block_3" data-delighter>
        「シャドーイング」「ディクテーション」「英作文」「リプロダクション」といった本格的な通訳トレーニングメソッドを活かした自己学習、毎日の課題提出と添削レポート、そしてネイティブ講師との実践的なプライベートレッスンを組み合わせることにより、1ヶ月という短期間で英語力をアップすることができます。受講期間中は専属の日本人トレーナーとネイティブ講師が、学習進捗から課題添削まで徹底サポートいたします。
    </p>

    <ul id="block_4">
        <li data-delighter>
            <span><img src="{{ asset('fe/images/pic_point_01.jpg') }}" alt="" /></span>
            <div>
                <p>1ヶ月という<span>超短期間</span>で、実践的な英話力が身につく。</p>
                <a href="#program_1">VIEW MORE</a>
            </div>
        </li>
        <li data-delighter>
            <span><img src="{{ asset('fe/images/pic_point_02.jpg') }}" alt="" /></span>
            <div>
                <p>本格的な<span>通訳トレーニングメソッド</span>で一気に英語力を伸ばす。</p>
                <a href="#program_2">VIEW MORE</a>
            </div>
        </li>
        <li data-delighter>
            <span><img src="{{ asset('fe/images/pic_point_03.jpg') }}" alt="" /></span>
            <div>
                <p>専属の日本人トレーナーとネイティブ講師が、学習進捗から課題添削まで<span>徹底サポート</span>。</p>
                <a href="#program_3">VIEW MORE</a>
            </div>
        </li>
        <li data-delighter>
            <span><img src="{{ asset('fe/images/pic_point_04.jpg') }}" alt="" /></span>
            <div>
                <p>ビジネスシーンを想定した実践的な表現が学べるネイティブ講師との<span>プライベートレッスン。</span></p>
                <a href="#program_4">VIEW MORE</a>
            </div>
        </li>
        <li data-delighter>
            <span><img src="{{ asset('fe/images/pic_point_05.jpg') }}" alt="" /></span>
            <div>
                <p>プロの通訳者、翻訳者、英語講師が開発した、<span>ビジネスシーンに即した教材。</span></p>
                <a href="#program_5">VIEW MORE</a>
            </div>
        </li>
        <li data-delighter>
            <span><img src="{{ asset('fe/images/pic_point_06.jpg') }}" alt="" /></span>
            <div>
                <p>時間や場所にとらわれず学習に集中できる<span>完全オンラインプログラム</span>。</p>
                <a href="#program_6">VIEW MORE</a>
            </div>
        </li>
    </ul>

    <div class="reservation_1">
        <p>プログラムの受講を検討している方を対象に<br>
            無料のオンラインカウンセリングを実施しております。</p>
        <a href="contact.html">無料カウンセリングのご予約</a>
    </div>


    <div id="block_5">
        <div id="program_1" class="point_icon" data-delighter><img src="{{ asset('fe/images/tip_program_01.png') }}" alt="" /></div>
        <p class="title_1" data-delighter>One Month of Intensive Learning</p>
        <h2 class="title_2" data-delighter>1ヶ月という<span>超短期間</span>で、<br>
            実践的な英話力が身につく<br class="br_mobile_1">プログラムの流れ</h2>

        <article data-delighter>
            <section>
                <div><img src="{{ asset('fe/images/tip_process_01.jpg') }}" alt="" /></div>
                <div>
                    <h4>初回カウンセリング &amp; スキルチェック</h4>
                    <p>まずは無料のオンラインカウンセリングにて、英語の使用状況やお悩みをお伺いし、スキルチェックで現在の英語力を測定します。<br>
                        併せて、「One Month Program」の詳細をご説明します。</p>
                </div>
            </section>

            <div class="arrow"><img src="{{ asset('fe/images/tip_arrow.png') }}" alt="" /></div>

            <section>
                <div><img src="{{ asset('fe/images/tip_process_02.jpg') }}" alt="" /></div>
                <div>
                    <h4>「One Month Program」 受講開始</h4>
                    <p>プログラムがスタートします。ディクテーション、シャドーイング、英作文の課題に毎日取り組んでいただきます。</p>
                </div>
            </section>

            <div class="arrow"><img src="{{ asset('fe/images/tip_arrow.png') }}" alt="" /></div>

            <section>
                <div><img src="{{ asset('fe/images/tip_process_03.jpg') }}" alt="" /></div>
                <div>
                    <h4>課題をトレーナーに提出</h4>
                    <p>完了した課題はトレーナーに提出します。<br>
                        トレーナーに提出することで、毎日英語を学習する習慣を作り上げていきます。</p>
                </div>
            </section>

            <div class="arrow"><img src="{{ asset('fe/images/tip_arrow.png') }}" alt="" /></div>

            <section>
                <div><img src="{{ asset('fe/images/tip_process_04.jpg') }}" alt="" /></div>
                <div>
                    <h4>トレーナーから課題に対する詳細なフィードバック</h4>
                    <p>提出された全ての課題を、トレーナーと講師が添削します。<br>
                        ミスの傾向、文法の弱点、発音のクセなどのフィードバックにより、気を付けるべきポイントを把握できます。</p>
                </div>
            </section>

            <div class="arrow"><img src="{{ asset('fe/images/tip_arrow.png') }}" alt="" /></div>

            <section>
                <div><img src="{{ asset('fe/images/tip_process_05.jpg') }}" alt="" /></div>
                <div>
                    <h4>ネイティブ英語講師とのレッスンで、学習内容のアウトプット練習</h4>
                    <p>欧米出身のネイティブ講師と60分間のオンラインプライベートレッスンを実施します。<br>
                        取り組んだ課題を実際にレッスンでアウトプットすることで、定着させます。<br>
                        （Standard・Advancedコースは講師1名で計8回、Masterコースは講師2名で計4回）</p>
                </div>
            </section>

            <div class="arrow"><img src="{{ asset('fe/images/tip_arrow.png') }}" alt="" /></div>

            <section>
                <div><img src="{{ asset('fe/images/tip_process_06.jpg') }}" alt="" /></div>
                <div>
                    <h4>最終カウンセリング</h4>
                    <p>受講終了時のカウンセリングでは、トレーナーより全体のフィードバックと今後に向けた学習アドバイスをいたします。<br>
                        また、これまでの学習をまとめた最終レポートもお渡しします。</p>
                </div>
            </section>
        </article>
    </div>


    <div id="block_6">
        <div id="program_2" class="point_icon" data-delighter><img src="{{ asset('fe/images/tip_program_02.png') }}" alt="" /></div>
        <p class="title_1" data-delighter>Interpreter Training Techniques</p>
        <h2 class="title_2" data-delighter>本格的な<span>通訳トレーニングメソッド</span>で<br>
            一気に英語力を伸ばす。</h2>

        <div class="tips_2" data-delighter>テンナイン・コミュニケーションが開発した、<br>
            通訳者が実際に行うトレーニング法を<br class="br_mobile_1">取り入れた完全オリジナル教材です。</div>

        <article>
            <section data-delighter>
                <div><img src="{{ asset('fe/images/pic_teaching_01.jpg') }}" alt="" /></div>
                <h4>シャドーイング</h4>
                <ul>
                    <li>聞こえてきた英語を少し間をあけてそのまま繰り返して声に出す学習法</li>
                    <li>音声をまねて発音することで、ネイティブの発音を口で覚えられる</li>
                    <li>ネイティブのスピードで発音することで、１回で聞けるようになる</li>
                </ul>
            </section>
            <section data-delighter>
                <div><img src="{{ asset('fe/images/pic_teaching_02.jpg') }}" alt="" /></div>
                <h4>ディクテーション</h4>
                <ul>
                    <li>聞こえてきた英語を書き取る学習法</li>
                    <li>リスニングで聞き取れていない部分を見える化できる</li>
                    <li>知らない単語やフレーズを洗い出せる</li>
                </ul>
            </section>
            <section data-delighter>
                <div><img src="{{ asset('fe/images/pic_teaching_03.jpg') }}" alt="" /></div>
                <h4>リプロダクション</h4>
                <ul>
                    <li>英語を聞いたら一度止めて、同じ英文をもう一度自分で発話する学習法</li>
                    <li>頭の中で英文を組み立てる力を養える</li>
                    <li>英文の内容が理解できているかチェックできる</li>
                </ul>
            </section>
            <section data-delighter>
                <div><img src="{{ asset('fe/images/pic_teaching_04.jpg') }}" alt="" /></div>
                <h4>英作文</h4>
                <ul>
                    <li>自分で英文を作成することで、アウトプット力を鍛える</li>
                    <li>難しい表現、英語で言いにくい表現に対応できるようになる</li>
                    <li>言いたいことを英語で表現できるようになり、スピーキング力もアップ</li>
                </ul>
            </section>
        </article>

        <p class="title_1" data-delighter>A Day in the Program </p>
        <h2 class="title_2" data-delighter>教材が体験できる動画</h2>

        <div id="footage" data-delighter>
            <div>
                <iframe src="https://www.youtube.com/embed/tTmvbDZh5ZY" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="" width="560" height="315" frameborder="0"></iframe>
            </div>
        </div>
    </div>


    <div id="block_7">
        <div id="program_3" class="point_icon" data-delighter><img src="{{ asset('fe/images/tip_program_03.png') }}" alt="" /></div>
        <p class="title_1" data-delighter>Fast and Thorough Support</p>
        <h2 class="title_2" data-delighter>専属の日本人トレーナーと<br class="br_mobile_1">ネイティブ講師が、<br>
            学習進捗から課題添削まで<br class="br_mobile_1"><span>徹底サポート</span>。</h2>

        <div class="tips_2" data-delighter>提出いただいた課題は<br class="br_mobile_1">トレーナーと講師が添削し、<br class="br_mobile_1">毎回約５ページにわたる<br>
            「英語の癖や弱点がよくわかる添削レポート」<br class="br_mobile_1">としてお返ししています。</div>

        <div id="sample">
            <div id="case_1" data-delighter>
                <div>
                    <a href="#" data-remodal-target="modal1"><img src="{{ asset('fe/images/pic_case_01.jpg') }}" alt="" /></a>
                    <h4>シャドーイング添削例</h4>
                    <p>ご提出いただいた音声を聴き、発音が不明瞭なところや相手に伝わりやすい発音についてのアドバイスなどをコメントしています。</p>
                </div>
                <div>
                    <a href="#" data-remodal-target="modal2"><img src="{{ asset('fe/images/pic_case_02.jpg') }}" alt="" /></a>
                    <h4>ディクテーション添削例</h4>
                    <p>ご提出いただいた文のなかで間違っているところの添削やミスしやすい傾向などを分析しコメントしています。</p>
                </div>
            </div>
            <div id="case_2" data-delighter>
                <div>
                    <a href="#" data-remodal-target="modal3"><img src="{{ asset('fe/images/pic_case_03.jpg') }}" alt="" /></a>
                    <a href="#" data-remodal-target="modal4"><img src="{{ asset('fe/images/pic_case_04.jpg') }}" alt="" /></a>
                </div>
                <h4>英作文添削例</h4>
                <p>詳しい解説とともに課題解決に向けたアドバイスなどもコメントしていますので、指摘されたポイントに気をつけながら学習を続けていくことで、自分でも気が付かなかった弱点も克服することができます。</p>
            </div>

            <div class="remodal" data-remodal-id="modal1">
                <a data-remodal-action="close" class="remodal-close"></a>
                <div><img src="{{ asset('fe/images/pic_case_01.jpg') }}" alt="" /></div>
            </div>
            <div class="remodal" data-remodal-id="modal2">
                <a data-remodal-action="close" class="remodal-close"></a>
                <img src="{{ asset('fe/images/pic_case_02.jpg') }}" alt="" />
            </div>
            <div class="remodal" data-remodal-id="modal3">
                <a data-remodal-action="close" class="remodal-close"></a>
                <img src="{{ asset('fe/images/pic_case_03.jpg') }}" alt="" />
            </div>
            <div class="remodal" data-remodal-id="modal4">
                <a data-remodal-action="close" class="remodal-close"></a>
                <img src="{{ asset('fe/images/pic_case_04.jpg') }}" alt="" />
            </div>
        </div>
    </div>


    <div id="block_8">
        <div id="program_4" class="point_icon" data-delighter><img src="{{ asset('fe/images/tip_program_04.png') }}" alt="" /></div>
        <p class="title_1" data-delighter>Private Lessons</p>
        <h2 class="title_2" data-delighter>ビジネスシーンを想定した<br class="_1">実践的な表現が学べる<br>
            ネイティブ講師との<br class="br_mobile_1"><span>プライベートレッスン</span>。</h2>
        <p id="lesson_summary" data-delighter>
            オンラインでのプライベートレッスンがStandard・Advancedコースは講師1名で計8回、Masterコースは講師2名で計4回あります。講師はアメリカやイギリスなどの英語圏のネイティブで、ビジネス英語の知識が豊富なだけでなく、ビジネスシーンに相応しい表現や、日本とのビジネス習慣の違いなども熟知しています。<br>
            英作文の課題で書いた内容を実践していただく場となり、受講生それぞれのニーズに合わせて完全カスタマイズすることができます。例えば、弁護士や医師のような特殊で専門的な英語を使われる方でも、利用シーンを想定した英作文を作成し、それをもとにレッスンを受けることができます。
        </p>
        <div id="pic_lesson" data-delighter><img src="{{ asset('fe/images/pic_lesson.jpg') }}" alt="" /></div>
    </div>


    <div id="block_9">
        <div id="program_5" class="point_icon" data-delighter><img src="{{ asset('fe/images/tip_program_05.png') }}" alt="" /></div>
        <p class="title_1" data-delighter>Business-Focused Materials</p>
        <h2 class="title_2" data-delighter>プロの通訳者、翻訳者、英語講師が<br class="br_mobile_1">開発した、<br>
            <span>ビジネスシーンに即した教材</span>。
        </h2>
        <p id="teaching" data-delighter>教材はWeek1からWeek4まで４冊あり、各週でゴールが設定されています。Masterコースの場合、Week1は「苦労する会話（Tough
            Conversations）」、Week2は「難し
            い相手との会話（Conversations With Difficult Counterparts）」となっています。そしてWeek3では「交渉術（Negotiation
            Techniques）」、Week4は「主張・アピールする（Adding Emphasis）」となり、ビジネスに特化したオリジナルの教材となっております。</p>
        <h3 data-delighter>One Month</h3>
        <div id="teaching_schedule" data-delighter>
            <div><img src="{{ asset('fe/images/tip_schedule_desktop.png') }}" alt="" /></div>
            <div><img src="{{ asset('fe/images/tip_schedule_mobile.png') }}" alt="" /></div>
        </div>
    </div>


    <div id="block_10">
        <div id="program_6" class="point_icon" data-delighter><img src="{{ asset('fe/images/tip_program_06.png') }}" alt="" /></div>
        <p class="title_1" data-delighter>100% Online</p>
        <h2 class="title_2" data-delighter>時間や場所にとらわれず<br class="br_mobile_1">学習に集中できる<br>
            <span>完全オンラインプログラム</span>。
        </h2>
        <div id="online_program" data-delighter>
            <div><img src="{{ asset('fe/images/pic_online_program.jpg') }}" alt="" /></div>
            <div>
                <p>多忙なビジネスパーソンのための短期集中オンライン英語パーソナルトレーニング「One Month Program」。</p>
                <span>多忙な受講者が時間や場所にとらわれず英語学習に集中できるように、初回カウンセリングから受講開始後の課題提出やフィードバック、プライベートレッスンにいたるまで、すべてオンラインでプログラムを完結させることができます。</span>
            </div>
        </div>
    </div>


    <div id="block_11">
        <p class="title_1" data-delighter>Testimonials</p>
        <h2 id="customer" class="title_2" data-delighter>お客様の声</h2>
        <article>
            <section data-delighter>
                <h3>コンサルティング　30代</h3>
                <p>
                    これまでとは英語の音が違って聞こえるようになり、発音も明らかに変わったのを感じます。日本語で言いたいことを英語にするのが難しく省略することが多かったですが、今は自分の考えをニュアンスを含めて伝えることができています。周りからも英語が伸びたと言われます。
                </p>
            </section>
            <section data-delighter>
                <h3>商社　40代</h3>
                <p>
                    教材がすべてビジネス向けに作られており、市販のテキストには載っていない使える表現がたくさんあるため、すぐに仕事に活かせました。1ヶ月のプログラムの中で作った英作文は自分用のテンプレートとしてその後も使い回しています。
                </p>
            </section>
            <section data-delighter>
                <h3>医薬系企業　40代</h3>
                <p>
                    英語の知識が増えるという面もありますが、それ以上に英語に慣れることができました。シャドーイング、ディクテーション、英作文、レッスンの組み合わせが良く、また丁寧に添削していただけたからこそだと思います。そのようなプログラムは他にあまりないのではないかと思いました。
                </p>
            </section>
            <section data-delighter>
                <h3>金融　30代</h3>
                <p>日本人トレーナー、ネイティブ講師ともにスキルが高くサポートがきめ細やかでした。どこから改善すればいいか適切なアドバイスをくれるので、ここ何年も伸び悩んでいた部分を伸ばすことができました。</p>
            </section>
            <section data-delighter>
                <h3>研究職　40代</h3>
                <p>安くはないですが、金額に見合った細やかなフィードバックをもらえます。自分で作った文章の添削や音声、レポートなどの資産が残るため、安い英会話教室に長く通うよりもコスパがいいと思います。</p>
            </section>
            <section data-delighter>
                <h3>IT企業　30代</h3>
                <p>
                    リエゾンを含めた発音の向上を明確に感じています。復習の量がまだまだ足りていないため、スピーキングへの成果はこれからだと思いますが、プログラムを通じて英語学習の正しいやり方や習慣が身についたこと、またネイティブと話すことへの抵抗感がなくなったのは、非常に良い変化だと感じています。
                </p>
            </section>
        </article>
    </div>


    <div class="reservation_2">
        <p>プログラムの受講を検討している方を対象に<br>
            無料のオンラインカウンセリングを実施しております。</p>
        <a href="contact.html">無料カウンセリングのご予約</a>
    </div>


    <div id="block_12">
        <p class="title_1" data-delighter>Course Lineup</p>
        <h2 id="course_select" class="title_2" data-delighter>英語レベルによって選べるコース紹介</h2>
        <p id="course" data-delighter>コース選びでお悩みの方は、まずはお気軽に無料カウンセリングでご相談ください。</p>
        <article>
            <section data-delighter>
                <h4>Standard</h4>
                <small>スタンダードコース</small>
                <p>今後英語を使う機会が増えるため、リスニングとスピーキングを強化したい方向けのコースです。</p>
                <span>英語力の目安：TOEIC<sup>&#9415;</sup>500～700点</span>
                <ul>
                    <li>通訳トレーニング法を取り入れた完全オリジナル教材</li>
                    <li>28日分の自己学習課題と添削レポート</li>
                    <li>ネイティブ講師とマンツーマンプライベートレッスン計8回</li>
                </ul>
            </section>
            <section data-delighter>
                <h4>Advanced</h4>
                <small>アドバンスコース</small>
                <p>より正確なメッセージを伝えられるように、ワンランク上の英語コミュニケーション力を強化したい方向けのコースです。</p>
                <span>英語力の目安：TOEIC<sup>&#9415;</sup>700点以上</span>
                <ul>
                    <li>通訳トレーニング法を取り入れた完全オリジナル教材</li>
                    <li>28日分の自己学習課題と添削レポート</li>
                    <li>ネイティブ講師とマンツーマンプライベートレッスン計8回</li>
                </ul>
            </section>
            <section data-delighter>
                <h4>Master</h4>
                <small>マスターコース</small>
                <p>日常的に仕事で英語を使っているが、多国籍メンバーとの会議や、オンライン会議での実践力を強化したい方向けのコースです。</p>
                <span>英語力の目安：TOEIC<sup>&#9415;</sup>900点以上 </span>
                <ul>
                    <li>通訳トレーニング法を取り入れた完全オリジナル教材</li>
                    <li>28日分の自己学習課題と添削レポート</li>
                    <li>ネイティブ講師と２対１のオンライン会議を想定した実践的なプライベートレッスン計4回</li>
                </ul>
            </section>
        </article>
        <div id="user" data-delighter>
            <div id="impressions">
                <div><img src="{{ asset('fe/images/pic_kiuchi.png') }}" alt="" /></div>
                <div>
                    <h4>英語上級者が感じている「音の壁」を解決できるように同時通訳者が開発したのが「One Month Program」です。</h4>
                    <p>
                        TOEIC900点以上を取得し、会話やメールもこなせる英語上級者であっても、ビジネスでもっと自分の言いたいことを表現したい、そのためにはどのように英語力を伸ばせばよいのか、というお悩みを抱えている方が多くいます。<br>
                        英語上級者が抱えている共通の弱点は、ネイティブスピーカーが容赦なく話すときのリスニング、つまり「音の壁」にあると言われています。<br>
                        ワンランク上のリスニング力を獲得していただくために、ネイティブスピーカーが普段聞いている雑音の混ざった「生の音声」を使用するなど同時通訳者ならではの視点で開発された「One Month
                        Program」は、さらに上を目指す英語上級者のために最適な教材となっています。</p>
                </div>
            </div>
            <div id="person">
                <h5><span>木内　裕也 <small>さん</small></span></h5>
                <p>会議通訳者、ミシガン州立大学研究者。<br>
                    20年以上にわたり、数多くの国際会議やビジネス会議の通訳に携わる。2009年5月にミシガン州立大学（MSU）にてアメリカ研究博士号を取得。<br>
                    現在はMSUのオンライン大学院プログラムディレクター。翻訳書籍に、「組織を救うモティベイター・マネジメント」、「マイ・ドリーム- バラク・オバマ自伝」など。</p>
            </div>
        </div>
    </div>


    <div id="block_13">
        <p class="title_1" data-delighter>Pricing</p>
        <h2 id="pricing" class="title_2" data-delighter>料金</h2>
        <div id="price" data-delighter>
            <div>
                <p>プログラム受講料</p>
                <h3>327,800 <span>円（税込）</span></h3>
                <ul>
                    <li>入会金、教材費は無料です。</li>
                    <li>One Month Programはオンライン完結型のプログラムです。</li>
                </ul>
            </div>
        </div>
        <h2 class="title_2" data-delighter>受講料に含まれるもの</h2>
        <ul id="include" data-delighter>
            <li>
                <img src="{{ asset('fe/images/tip_include_01.jpg') }}" alt="" />
                <p>スタート前の<br>
                    初回スキルチェック</p>
            </li>
            <li>
                <img src="{{ asset('fe/images/tip_include_02.jpg') }}" alt="" />
                <p>初回カウンセリング<br>
                    学習計画立案</p>
            </li>
            <li>
                <img src="{{ asset('fe/images/tip_include_03.jpg') }}" alt="" />
                <p>自己学習用テキスト<br>
                    （28日分）</p>
            </li>
            <li>
                <img src="{{ asset('fe/images/tip_include_04.jpg') }}" alt="" />
                <p>ディクテーション<br>
                    課題<br>
                    （28日分）</p>
            </li>
            <li>
                <img src="{{ asset('fe/images/tip_include_05.jpg') }}" alt="" />
                <p>シャドーイング<br>
                    課題<br>
                    （28日分）</p>
            </li>
            <li>
                <img src="{{ asset('fe/images/tip_include_06.jpg') }}" alt="" />
                <p>英作文<br>
                    課題<br>
                    （28日分）</p>
            </li>
            <li>
                <img src="{{ asset('fe/images/tip_include_07.jpg') }}" alt="" />
                <p>ディクテーション<br>
                    添削レポート<br>
                    （28日分）</p>
            </li>
            <li>
                <img src="{{ asset('fe/images/tip_include_08.jpg') }}" alt="" />
                <p>シャドーイング<br>
                    添削レポート<br>
                    （28日分）</p>
            </li>
            <li>
                <img src="{{ asset('fe/images/tip_include_09.jpg') }}" alt="" />
                <p>英作文<br>
                    添削レポート<br>
                    （28日分）</p>
            </li>
            <li>
                <img src="{{ asset('fe/images/tip_include_10.jpg') }}" alt="" />
                <p>60分間のネイティブ講師との<br>
                    プライベートレッスン※<br>
                    （オンライン）</p>
            </li>
            <li>
                <img src="{{ asset('fe/images/tip_include_11.jpg') }}" alt="" />
                <p>1ヶ月の振り返りと<br>
                    今後の学習方法<br>
                    アドバイス</p>
            </li>
            <li>
                <img src="{{ asset('fe/images/tip_include_12.jpg') }}" alt="" />
                <p>英語に関する質疑応答<br>
                    （受講期間中は無制限）</p>
            </li>
        </ul>
        <p id="notice" data-delighter>Standard・Advancedコースは講師1名で計8回、Masterコースは講師2名で計4回になります。</p>
    </div>



    <div id="block_15">
        <h2 class="title_2" data-delighter><img src="{{ asset('fe/images/plus01.jpg') }}" alt="One Month Program Plus" /></h2>
        <p class="txt_1" data-delighter>One Month Program Plusは、<br>
            更にスピーキング力を強化したい方のためのプランです。<br>
            合計16回のプライベートレッスンが受講可能となります。</p>
        <div class="box_1" data-delighter>
            <div class="">
                <div class="img"><img src="{{ asset('fe/images/plus02.jpg') }}" alt="" /></div>
                <p class="txt">通常受講に加え、<br>
                    プライベートレッスンが8回追加</p>
            </div>
        </div>
        <div class="box_2" data-delighter>
            <div class="img">
                <img class="pc" src="{{ asset('fe/images/plus03.png') }}" alt="" />
                <img class="sp" src="{{ asset('fe/images/plus03_sp.png') }}" alt="" />
            </div>
            <p class="txt">詳細はカウンセリング時にご説明いたします。</p>
            <p class="txt indent">※対象コースは、Standardコース、Advancedコースになります。</p>
            <p class="txt indent">※別料金でのご案内となります。</p>
        </div>
    </div>


    <div class="reservation_3">
        <p>法人向けのプログラムもご提供しております。<br>
            ハイポテンシャル人材向けの英語トレーニングに<br>
            興味をお持ちの法人様もご相談ください。</p>
        <a href="../contact.html">法人のお客様からのご相談</a>
        <div id="mobile_img"><img src="{{ asset('fe/images/pic_reservation_3_mobile.jpg') }}" alt="" /></div>
    </div>


    <div id="block_14">
        <p class="title_1" data-delighter>FAQ</p>
        <h2 id="faq" class="title_2" data-delighter>よくあるご質問</h2>
        <article data-delighter>
            <section>
                <h3 class="accordion_title">プログラムはオンラインで行われるのでしょうか？</h3>
                <div class="accordion_detail">
                    <p>はい、すべてオンラインで実施いたします。<br>
                        カウンセリングやお申込みのお手続き、レッスンはすべてオンラインで実施いたします。ご来社いただく必要はございません。</p>
                </div>
            </section>
            <section>
                <h3 class="accordion_title">一日当たりの学習時間はどのくらいですか？</h3>
                <div class="accordion_detail">
                    <p>およそ９０分を目安にしています。<br>
                        多くの受講者の方がスキマ時間も活用して学習されています。例えば、通勤中に英作文のメモをしたり、休憩時間にシャドーイング音声を聞いたりして、効率よく学習されています。</p>
                </div>
            </section>
            <section>
                <h3 class="accordion_title">どのぐらい話せるようになりますか？</h3>
                <div class="accordion_detail">
                    <p>主に以下の３点で力を伸ばしていただけます。<br>
                        ・話したいことを英語にするスピード<br>
                        ・1度に話せる文章量<br>
                        ・正確なリスニング<br>
                        添削された英作文を使ってスピーキングのレッスンを行いますので、話したいことをどう英語にするかで悩まずに話せるようになります。また、聞かれたことに対してより多くの文で話すことができるようになります。さらに、シャドーイングのトレーニングによって、自然な発音を身につけ、相手の話すことを聴き取る力が向上します。
                    </p>
                </div>
            </section>
            <section>
                <h3 class="accordion_title">受講開始までどのくらいかかりますか？</h3>
                <div class="accordion_detail">
                    <p>ご入金確認後、即日プログラムを開始していただけます。<br>
                        学習方法や課題をメールでご案内いたします。課題は当日から開始いただけます。</p>
                </div>
            </section>
            <section>
                <h3 class="accordion_title">ブランクがあっても大丈夫ですか？</h3>
                <div class="accordion_detail">
                    <p>問題ありません。カウンセリングを通して適切なコースをご案内いたします。<br>
                        英作文は、ご自身のことを書いていただくものですので、ご自身が使うであろう英語をイメージしていただくことが大切です。シャドーイングは、発音のテクニックを確認して進めていきますので、少しずつ応用していくことで着実に力をつけることができます。ネイティブ講師とのプライベートレッスンは、ご提出の英作文をもとに会話を進めていきますので、事前にレポートを使った復習をしておくことで、スムーズに会話ができ、内容を掘り下げることが可能になります。
                    </p>
                </div>
            </section>
            <section>
                <h3 class="accordion_title">どのコースを受講したらよいか迷っています。</h3>
                <div class="accordion_detail">
                    <p>無料カウンセリングで各コースのご説明をいたします。また、スキルチェックやこれまでの学習経験、今後英語を使われる状況から最適なコースをおすすめいたします。</p>
                </div>
            </section>
            <section>
                <h3 class="accordion_title">1ヶ月で終了しない場合はどうなりますか？</h3>
                <div class="accordion_detail">
                    <p>最大2ヶ月まで受講期間を延長していただけます。</p>
                </div>
            </section>
            <section>
                <h3 class="accordion_title">課題は必ず毎日提出しなければいけませんか？</h3>
                <div class="accordion_detail">
                    <p>毎日の学習が理想的ですが、例えば週末に課題をまとめて行っていただいてもOKです。課題をこなすことが目的でなく、ご自身にとって必要な英語を集めるという感覚で取り組んでいただければと思います。</p>
                </div>
            </section>
            <section>
                <h3 class="accordion_title">レッスンを担当するネイティブ講師はどんな人ですか？</h3>
                <div class="accordion_detail">
                    <p>弊社専属のネイティブ講師です。出身はアメリカ、イギリス、カナダ、オーストラリア、です。様々な企業での英語研修を経験しています。</p>
                </div>
            </section>
            <section>
                <h3 class="accordion_title">One Month Programが終了した後のプログラムはありますか？</h3>
                <div class="accordion_detail">
                    <p>One Month Programで学習したことを継続いただけるフォローアッププログラムがあります。詳細は無料カウンセリングでお尋ねください。</p>
                </div>
            </section>
        </article>
    </div>


    <div class="reservation_1">
        <p>プログラムの受講を検討している方を対象に<br>
            無料のオンラインカウンセリングを実施しております。</p>
        <a href="contact.html">無料カウンセリングのご予約</a>
    </div>
</div>

@endsection

@section('script-footer')

<script src="{{ asset('fe/assets/js/functions.js') }}"></script>
<script src="{{ asset('fe/assets/js/slick.min.js') }}"></script>
<script src="{{ asset('fe/assets/js/jquery.bxslider.min.js') }}"></script>
<script>
    $(function() {
        $('#stories_mobile').bxSlider({
            auto: false,
            pause: 1000,
            pager: false
        });
    });
</script>
<script src="{{ asset('fe/assets/js/remodal.js') }}"></script>
<script>
    $(function() {
        $('#slider_desktop').slick({
            autoplay: true,
            autoplaySpeed: 12000,
            speed: 1000,
            fade: true,
            pauseOnHover: false,
            dots: true,
            infinite: true,
            arrows: true,
            touchMove: true,
        });
    });
    $(function() {
        $('#slider_mobile').slick({
            autoplay: true,
            autoplaySpeed: 12000,
            speed: 1000,
            fade: true,
            pauseOnHover: false,
            dots: true,
            infinite: true,
            arrows: true,
            touchMove: true,
        });
    });
</script>
<script src="{{ asset('fe/assets/js/delighters.js') }}"></script>
@endsection