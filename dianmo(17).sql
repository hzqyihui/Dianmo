-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-06-14 16:59:46
-- 服务器版本： 10.1.10-MariaDB
-- PHP Version: 5.5.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dianmo`
--

-- --------------------------------------------------------

--
-- 表的结构 `admire`
--

CREATE TABLE `admire` (
  `id` int(11) NOT NULL COMMENT '点赞id',
  `user_name` varchar(25) NOT NULL COMMENT '用户名称',
  `all_admire_num` int(11) NOT NULL COMMENT '被点赞数量'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='点赞表';

-- --------------------------------------------------------

--
-- 表的结构 `artical`
--

CREATE TABLE `artical` (
  `id` int(11) NOT NULL COMMENT '文章id',
  `name` varchar(30) NOT NULL COMMENT '文章名',
  `artical` text NOT NULL COMMENT '文章内容',
  `pic_path` varchar(100) NOT NULL COMMENT '文章图片',
  `writer` varchar(20) NOT NULL COMMENT '作者',
  `writer_id` int(11) NOT NULL COMMENT '作者id',
  `class` varchar(30) NOT NULL COMMENT '类别',
  `admire_num` int(11) NOT NULL COMMENT '点赞量',
  `time` datetime NOT NULL COMMENT '上传时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `artical`
--

INSERT INTO `artical` (`id`, `name`, `artical`, `pic_path`, `writer`, `writer_id`, `class`, `admire_num`, `time`) VALUES
(5, '起风', '起风了，挂在窗边的风铃响了。叮叮咚咚，好清脆。天黑了，黑的让我忍不住恐惧。风还没有停，它越来越大了，依稀看见窗外的树叶飞散，桌上的稿纸也散了，地面上到处都是。纸团，装满的垃圾篓也倒了，里面满是好久不见的孤寂。\r\n   听见楼下小贩的呼喊，看见对面收衣服的小孩，乱舞的树枝，听不见蝉鸣。想你了，却不知道该怎么开口。聊天对话框，打开又关掉，磨磨蹭蹭了好久还是一片空白。偶然的点一下刷新，你已不在我的列表内，我竟无言以对。你不是我的谁，我也要求不了什么。我现在能做的知识看着那一片蓝天想你。\r\n   都会变的，我也变了。桌上的罐子里，还剩一颗星星，我把它打开，里面写着的一个秘密，我觉得它已经不重要了，然后，罐子就空了。灌了两三瓶酒，稿纸全湿了，我是该庆幸没拿钢笔写，还是该后悔拿的签字笔呢？不知道过了好久，改掉了网名，换掉了个签。\r\n   一觉睡醒，果然，你还是回来了，列表里安安静静。只有你，但是已经够了。风停了，我也醒了。不是所有过不去的事都过不去。还是有一些，终究会过去。\r\n   起风了，再见了。', 'source/photo/writer/_1465056998.jpg', '华志强', 8, '现代美文', 20, '2016-06-05 00:49:40');

-- --------------------------------------------------------

--
-- 表的结构 `calligraphy`
--

CREATE TABLE `calligraphy` (
  `id` int(11) NOT NULL COMMENT '书画id',
  `writer` varchar(30) NOT NULL COMMENT '作者名称',
  `pic_path` varchar(100) NOT NULL COMMENT '图片路径',
  `admire_num` int(11) NOT NULL COMMENT '点赞数量',
  `upload_id` int(10) NOT NULL COMMENT '上传书画id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comments_artical`
--

CREATE TABLE `comments_artical` (
  `u_id` int(11) NOT NULL COMMENT '用户评论id',
  `u_name` varchar(30) NOT NULL COMMENT '用户名称',
  `object_id` int(11) NOT NULL COMMENT '评论对象id',
  `object` varchar(100) NOT NULL COMMENT '评论对象',
  `comment` text NOT NULL COMMENT '评论内容',
  `time` datetime NOT NULL COMMENT '评论时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comments_calli`
--

CREATE TABLE `comments_calli` (
  `u_id` int(11) NOT NULL COMMENT '用户评论id',
  `u_name` varchar(30) NOT NULL COMMENT '用户名称',
  `object_id` int(11) NOT NULL COMMENT '评论对象id',
  `comment` text NOT NULL COMMENT '评论内容',
  `time` datetime NOT NULL COMMENT '评论时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comments_music`
--

CREATE TABLE `comments_music` (
  `u_id` int(11) NOT NULL COMMENT '用户评论id',
  `u_name` varchar(30) NOT NULL COMMENT '用户名称',
  `object_id` int(11) NOT NULL COMMENT '评论对象id',
  `object` varchar(100) NOT NULL COMMENT '评论对象',
  `comment` text NOT NULL COMMENT '评论内容',
  `time` datetime NOT NULL COMMENT '评论时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comments_poem`
--

CREATE TABLE `comments_poem` (
  `u_id` int(11) NOT NULL COMMENT '用户评论id',
  `u_name` varchar(30) NOT NULL COMMENT '用户名称',
  `object_id` int(11) NOT NULL COMMENT '评论对象id',
  `object` varchar(100) NOT NULL COMMENT '评论对象',
  `comment` text NOT NULL COMMENT '评论内容',
  `time` datetime NOT NULL COMMENT '评论时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `music`
--

CREATE TABLE `music` (
  `id` int(11) NOT NULL COMMENT '音乐id',
  `music_name` varchar(40) NOT NULL COMMENT '音乐名',
  `pic_path` varchar(100) NOT NULL COMMENT '图片地址',
  `music_path` varchar(100) NOT NULL COMMENT '音乐地址',
  `singer` varchar(30) NOT NULL COMMENT '歌手',
  `writer` varchar(30) NOT NULL COMMENT '作词',
  `composer` varchar(30) NOT NULL COMMENT '作曲',
  `arranger` varchar(30) NOT NULL COMMENT '编曲',
  `lyric` text NOT NULL COMMENT '歌词',
  `admire_num` int(11) NOT NULL COMMENT '点赞数量',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '上传时间戳',
  `upload_id` int(10) NOT NULL COMMENT '上传音乐id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `poem`
--

CREATE TABLE `poem` (
  `id` int(11) NOT NULL COMMENT '古诗id',
  `name` varchar(45) NOT NULL COMMENT '古诗名',
  `pic_path` varchar(300) NOT NULL COMMENT '图片路径',
  `class` varchar(10) NOT NULL COMMENT '类别',
  `writer` varchar(20) NOT NULL COMMENT '作者',
  `writer_id` int(11) NOT NULL COMMENT '作者id',
  `poem` text NOT NULL COMMENT '古诗内容',
  `admire_num` int(11) NOT NULL COMMENT '点赞量',
  `note` text NOT NULL COMMENT '注释',
  `translation` text NOT NULL COMMENT '翻译',
  `appreciate` text NOT NULL COMMENT '赏析',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '时间戳'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `poem`
--

INSERT INTO `poem` (`id`, `name`, `pic_path`, `class`, `writer`, `writer_id`, `poem`, `admire_num`, `note`, `translation`, `appreciate`, `time`) VALUES
(14, '念奴娇·赤壁怀古', 'source/photo/poem/_1465044242.jpg', '诗', '苏轼', 2, '大江东去，浪淘尽，千古风流人物。故垒西边，人道是，三国周郎赤壁。乱石穿空，惊涛拍岸，卷起千堆雪。江山如画，一时多少豪杰。遥想公瑾当年，小乔初嫁了，雄姿英发。羽扇纶巾，谈笑间，樯橹灰飞烟灭。故国神游，多情应笑我，早生华发。人生如梦，一尊还酹江月。', 75, '⑴念奴娇：词牌名。又名“百字令”“酹江月”等。赤壁：此指黄州赤壁，一名“赤鼻矶”，在今湖北黄冈西。而三国古战场的赤壁，文化界认为在今湖北赤壁市蒲圻县西北。\r\n⑵大江：指长江。\r\n⑶淘：冲洗，冲刷。\r\n⑷风流人物：指杰出的历史名人。\r\n⑸故垒：过去遗留下来的营垒。\r\n⑹周郎：指三国时吴国名将周瑜，字公瑾，少年得志，二十四为中郎将，掌管东吴重兵，吴中皆呼为“周郎”。下文中的“公瑾”，即指周瑜。\r\n⑺雪：比喻浪花。\r\n⑻遥想：形容想得很远；回忆。\r\n⑼小乔初嫁了（liǎo）：《三国志·吴志·周瑜传》载，周瑜从孙策攻皖，“得桥公两女，皆国色也。策自纳大桥，瑜纳小桥。”乔，本作“桥”。其时距赤壁之战已经十年，此处言“初嫁”，是言其少年得意，倜傥风流。\r\n⑽雄姿英发（fā）：谓周瑜体貌不凡，言谈卓绝。英发，谈吐不凡，见识卓越。\r\n⑾羽扇纶（guān）巾：古代儒将的便装打扮。羽扇，羽毛制成的扇子。纶巾，青丝制成的头巾。\r\n⑿樯橹（qiánglǔ）：这里代指曹操的水军战船。樯，挂帆的桅杆。橹，一种摇船的桨。“樯橹”一作“强虏”，又作“樯虏”，又作“狂虏”。。\r\n⒀故国神游：“神游故国”的倒文。故国：这里指旧地，当年的赤壁战场。神游：于想象、梦境中游历。\r\n⒁“多情”二句：“应笑我多情，早生华发”的倒文。华发（fà）：花白的头发。\r\n⒂一尊还（huán）酹（lèi）江月：古人祭奠以酒浇在地上祭奠。这里指洒酒酬月，寄托自己的感情。尊：通“樽”，酒杯。', '长江向东流去，波浪滚滚，千古的英雄人物都（随着长江水）逝去。那旧营垒的西边，人们说（那）就是三国时候周瑜（作战的）赤壁。陡峭不平的石壁直刺天空，大浪拍击着江岸，激起一堆堆雪白的浪花。江山象一幅奇丽的图画，那个时代汇集了多少英雄豪杰。遥想当年的周瑜，小乔刚嫁给他，他正年经有为，威武的仪表，英姿奋发。（他）手握羽扇，头戴纶巾，谈笑之间，（就把）强敌的战船烧得灰飞烟灭。（此时此刻），（我）怀想三国旧事，凭吊古人，应该笑我自己多情善感，头发早早地都变白了。人生在世就象一场梦一样，我还是倒一杯酒来祭奠江上的明月吧！', '《念奴娇·赤壁怀古》是宋代文学家苏轼的词作，是豪放词的代表作之一。此词通过对月夜江上壮美景色的描绘，借对古代战场的凭吊和对风流人物才略、气度、功业的追念，曲折地表达了作者怀才不遇、功业未就、老大未成的忧愤之情，同时表现了作者关注历史和人生的旷达之心。全词借古抒怀，雄浑苍凉，大气磅礴，笔力遒劲，境界宏阔，将写景、咏史、抒情融为一体，给人以撼魂荡魄的艺术力量，曾被誉为“古今绝唱”。', '2016-06-14 06:39:10'),
(15, '念奴娇·赤壁怀', 'source/photo/poem/_1465045680.jpg', '诗', '苏轼', 2, '大江东去，浪淘尽，千古风流人物。故垒西边，人道是，三国周郎赤壁。乱石穿空，惊涛拍岸，卷起千堆雪。江山如画，一时多少豪杰。遥想公瑾当年，小乔初嫁了，雄姿英发。羽扇纶巾，谈笑间，樯橹灰飞烟灭。故国神游，多情应笑我，早生华发。人生如梦，一尊还酹江月。', 0, '⑴念奴娇：词牌名。又名“百字令”“酹江月”等。赤壁：此指黄州赤壁，一名“赤鼻矶”，在今湖北黄冈西。而三国古战场的赤壁，文化界认为在今湖北赤壁市蒲圻县西北。\r\n⑵大江：指长江。\r\n⑶淘：冲洗，冲刷。\r\n⑷风流人物：指杰出的历史名人。\r\n⑸故垒：过去遗留下来的营垒。\r\n⑹周郎：指三国时吴国名将周瑜，字公瑾，少年得志，二十四为中郎将，掌管东吴重兵，吴中皆呼为“周郎”。下文中的“公瑾”，即指周瑜。\r\n⑺雪：比喻浪花。\r\n⑻遥想：形容想得很远；回忆。\r\n⑼小乔初嫁了（liǎo）：《三国志·吴志·周瑜传》载，周瑜从孙策攻皖，“得桥公两女，皆国色也。策自纳大桥，瑜纳小桥。”乔，本作“桥”。其时距赤壁之战已经十年，此处言“初嫁”，是言其少年得意，倜傥风流。\r\n⑽雄姿英发（fā）：谓周瑜体貌不凡，言谈卓绝。英发，谈吐不凡，见识卓越。\r\n⑾羽扇纶（guān）巾：古代儒将的便装打扮。羽扇，羽毛制成的扇子。纶巾，青丝制成的头巾。\r\n⑿樯橹（qiánglǔ）：这里代指曹操的水军战船。樯，挂帆的桅杆。橹，一种摇船的桨。“樯橹”一作“强虏”，又作“樯虏”，又作“狂虏”。。\r\n⒀故国神游：“神游故国”的倒文。故国：这里指旧地，当年的赤壁战场。神游：于想象、梦境中游历。\r\n⒁“多情”二句：“应笑我多情，早生华发”的倒文。华发（fà）：花白的头发。\r\n⒂一尊还（huán）酹（lèi）江月：古人祭奠以酒浇在地上祭奠。这里指洒酒酬月，寄托自己的感情。尊：通“樽”，酒杯。', '长江向东流去，波浪滚滚，千古的英雄人物都（随着长江水）逝去。那旧营垒的西边，人们说（那）就是三国时候周瑜（作战的）赤壁。陡峭不平的石壁直刺天空，大浪拍击着江岸，激起一堆堆雪白的浪花。江山象一幅奇丽的图画，那个时代汇集了多少英雄豪杰。\r\n遥想当年的周瑜，小乔刚嫁给他，他正年经有为，威武的仪表，英姿奋发。（他）手握羽扇，头戴纶巾，谈笑之间，（就把）强敌的战船烧得灰飞烟灭。（此时此刻），（我）怀想三国旧事，凭吊古人，应该笑我自己多情善感，头发早早地都变白了。人生在世就象一场梦一样，我还是倒一杯酒来祭奠江上的明月吧！', '《念奴娇·赤壁怀古》是宋代文学家苏轼的词作，是豪放词的代表作之一。此词通过对月夜江上壮美景色的描绘，借对古代战场的凭吊和对风流人物才略、气度、功业的追念，曲折地表达了作者怀才不遇、功业未就、老大未成的忧愤之情，同时表现了作者关注历史和人生的旷达之心。全词借古抒怀，雄浑苍凉，大气磅礴，笔力遒劲，境界宏阔，将写景、咏史、抒情融为一体，给人以撼魂荡魄的艺术力量，曾被誉为“古今绝唱”。', '2016-06-05 10:11:41'),
(16, '念奴娇·赤壁怀古', 'source/photo/poem/_1465045798.jpg', '诗', '苏轼', 2, '大江东去，浪淘尽，千古风流人物。故垒西边，人道是，三国周郎赤壁。乱石穿空，惊涛拍岸，卷起千堆雪。江山如画，一时多少豪杰。遥想公瑾当年，小乔初嫁了，雄姿英发。羽扇纶巾，谈笑间，樯橹灰飞烟灭。故国神游，多情应笑我，早生华发。人生如梦，一尊还酹江月。', 2, '大江东去，浪淘尽，千古风流人物。故垒西边，人道是，三国周郎赤壁。乱石穿空，惊涛拍岸，卷起千堆雪。江山如画，一时多少豪杰。\r\n长江向东流去，波浪滚滚，千古的英雄人物都（随着长江水）逝去。那旧营垒的西边，人们说（那）就是三国时候周瑜（作战的）赤壁。陡峭不平的石壁直刺天空，大浪拍击着江岸，激起一堆堆雪白的浪花。江山象一幅奇丽的图画，那个时代汇集了多少英雄豪杰。\r\n遥想公瑾当年，小乔初嫁了，雄姿英发。羽扇纶巾，谈笑间，樯橹灰飞烟灭。故国神游，多情应笑我，早生华发。人生如梦，一尊还酹江月。\r\n遥想当年的周瑜，小乔刚嫁给他，他正年经有为，威武的仪表，英姿奋发。（他）手握羽扇，头戴纶巾，谈笑之间，（就把）强敌的战船烧得灰飞烟灭。（此时此刻），（我）怀想三国旧事，凭吊古人，应该笑我自己多情善感，头发早早地都变白了。人生在世就象一场梦一样，我还是倒一杯酒来祭奠江上的明月吧！', '长江向东流去，波浪滚滚，千古的英雄人物都（随着长江水）逝去。那旧营垒的西边，人们说（那）就是三国时候周瑜（作战的）赤壁。陡峭不平的石壁直刺天空，大浪拍击着江岸，激起一堆堆雪白的浪花。江山象一幅奇丽的图画，那个时代汇集了多少英雄豪杰。\r\n遥想当年的周瑜，小乔刚嫁给他，他正年经有为，威武的仪表，英姿奋发。（他）手握羽扇，头戴纶巾，谈笑之间，（就把）强敌的战船烧得灰飞烟灭。（此时此刻），（我）怀想三国旧事，凭吊古人，应该笑我自己多情善感，头发早早地都变白了。人生在世就象一场梦一样，我还是倒一杯酒来祭奠江上的明月吧！', '⑴念奴娇：词牌名。又名“百字令”“酹江月”等。赤壁：此指黄州赤壁，一名“赤鼻矶”，在今湖北黄冈西。而三国古战场的赤壁，文化界认为在今湖北赤壁市蒲圻县西北。\r\n⑵大江：指长江。\r\n⑶淘：冲洗，冲刷。\r\n⑷风流人物：指杰出的历史名人。\r\n⑸故垒：过去遗留下来的营垒。\r\n⑹周郎：指三国时吴国名将周瑜，字公瑾，少年得志，二十四为中郎将，掌管东吴重兵，吴中皆呼为“周郎”。下文中的“公瑾”，即指周瑜。\r\n⑺雪：比喻浪花。\r\n⑻遥想：形容想得很远；回忆。\r\n⑼小乔初嫁了（liǎo）：《三国志·吴志·周瑜传》载，周瑜从孙策攻皖，“得桥公两女，皆国色也。策自纳大桥，瑜纳小桥。”乔，本作“桥”。其时距赤壁之战已经十年，此处言“初嫁”，是言其少年得意，倜傥风流。\r\n⑽雄姿英发（fā）：谓周瑜体貌不凡，言谈卓绝。英发，谈吐不凡，见识卓越。\r\n⑾羽扇纶（guān）巾：古代儒将的便装打扮。羽扇，羽毛制成的扇子。纶巾，青丝制成的头巾。\r\n⑿樯橹（qiánglǔ）：这里代指曹操的水军战船。樯，挂帆的桅杆。橹，一种摇船的桨。“樯橹”一作“强虏”，又作“樯虏”，又作“狂虏”。。\r\n⒀故国神游：“神游故国”的倒文。故国：这里指旧地，当年的赤壁战场。神游：于想象、梦境中游历。\r\n⒁“多情”二句：“应笑我多情，早生华发”的倒文。华发（fà）：花白的头发。\r\n⒂一尊还（huán）酹（lèi）江月：古人祭奠以酒浇在地上祭奠。这里指洒酒酬月，寄托自己的感情。尊：通“樽”，酒杯。', '2016-06-14 05:39:37'),
(18, '从军行', 'source/photo/poem/_1465052628.jpg', '词', '王昌龄', 4, '青海长云暗雪山，孤城遥望玉门关。\r\n黄沙百战穿金甲，不破楼兰终不还。', 6, '1.从军行：乐府旧题，内容多写军队战争之事。\r\n2.青海：指青海湖。\r\n3.雪山：这里指甘肃省的祁连山。\r\n4.穿：磨破。\r\n5.金甲：战衣，金属制的铠甲。\r\n6.楼兰：汉代西域国名，这里泛指当时骚扰西北边疆的敌人。\r\n7.孤城：当是青海地区的一座城。一说孤城即玉门关。\r\n8.玉门关：汉武帝置，因西域输入玉石取道于此而得名。故址在今甘肃敦煌西北小方盘城。六朝时关址东移至今安西双塔堡附近。', '青海上空的阴云遮暗了雪山，站在孤城遥望着远方的玉门关。塞外身经百战磨穿了盔和甲，不打败西部的敌人誓不回还。', '“青海长云暗雪山，孤城遥望玉门关”。青海湖上空，长云弥漫；湖的北面，横亘着绵延千里的隐隐的雪山；越过雪山，是矗立在河西走廊荒漠中的一座孤城；再往西，就是和孤城遥遥相对的军事要塞——玉门关。这幅集中了东西数千里广阔地域的长卷，就是当时西北边戍边将士生活、战斗的典型环境。它是对整个西北边陲的一个鸟瞰，一个概括。\r\n为什么特别提及青海与玉门关呢？这跟当时民族之间战争的态势有关。唐代西、北方的强敌，一是吐蕃，一是突厥。河西节度使的任务是隔断吐蕃与突厥的交通，一镇兼顾西方、北方两个强敌，主要是防御吐蕃，守护河西走廊。“青海”地区，正是吐蕃与唐军多次作战的场所；而“玉门关”外，则是突厥的势力范围。\r\n所以这两句不仅描绘了整个西北边陲的景象，而且点出了“孤城”南拒吐蕃，西防突厥的极其重要的地理形势。这两个方向的强敌，正是戍守“孤城”的将士心之所系，宜乎在画面上出现青海与玉关。与其说，这是将士望中所见，不如说这是将士脑海中浮现出来的画面。这两句在写景的同时渗透丰富复杂的感情：戍边将士对边防形势的关注，对自己所担负的任务的自豪感、责任感，以及戍边生活的孤寂、艰苦之感，都融合在悲壮、开阔而又迷蒙暗淡的景色里。\r\n第三、四两句由情景交融的环境描写转为直接抒情。“黄沙百战穿金甲”，是概括力极强的诗句。戍边时间之漫长，战事之频繁，战斗之艰苦，敌军之强悍，边地之荒凉，都于此七字中概括无遗。“百战”是比较抽象的，冠以“黄沙”二字，就突出了西北战场的特征，令人宛见“日暮云沙古战场”的景象；“百战”而至“穿金甲”，更可想见战斗之艰苦激烈，也可想见这漫长的时间中有一系列“白骨掩蓬蒿”式的壮烈牺牲。但是，金甲尽管磨穿，将士的报国壮志却并没有销磨，而是在大漠风沙的磨炼中变得更加坚定。\r\n“不破楼兰终不还”，就是身经百战的将士豪壮的誓言。上一句把战斗之艰苦，战事之频繁越写得突出，这一句便越显得铿锵有力，掷地有声。一二两句，境界阔大，感情悲壮，含蕴丰富；三四两句之间，显然有转折，二句形成鲜明对照。“黄沙”句尽管写出了战争的艰苦，但整个形象给人的实际感受是雄壮有力，而不是低沉伤感的。\r\n因此末句并非嗟叹归家无日，而是在深深意识到战争的艰苦、长期的基础上所发出的更坚定、深沉的誓言，盛唐优秀边塞诗的一个重要的思想特色，就是在抒写戍边将士的豪情壮志的同时，并不回避战争的艰苦，本篇就是一个显例。可以说，三四两句这种不是空洞肤浅的抒情，正需要有一二两句那种含蕴丰富的大处落墨的环境描写。典型环境与人物感情高度统一，是王昌龄绝句的一个突出优点，这在本篇中也有明显的体现。全诗表明了将士们驻守边关的宏伟壮志。', '2016-06-14 08:58:56'),
(19, '醉花阴', 'source/photo/poem/_1465053104.jpg', '曲', '李清照', 7, '《醉花阴·薄雾浓云愁永昼》\r\n李清照\r\n薄雾浓云愁永昼，瑞脑消金兽。 \r\n佳节又重阳，玉枕纱厨，半夜凉初透。\r\n东篱把酒黄昏后，有暗香盈袖。 \r\n莫道不销魂，帘卷西风，人比黄花瘦。', 3, '永昼：漫长的白天。\r\n瑞脑：一种香料，俗称冰片。\r\n金兽：兽形的铜香炉。\r\n纱厨：纱帐。\r\n东篱：泛指采菊之地，取自陶渊明《饮酒》诗：“采菊东篱下”。\r\n暗香：这里指菊花的幽香。古诗《庭中有奇树》：”攀条折其荣，将以遗所思。馨香盈怀袖，路远莫致之“这里用其意。\r\n消魂：形容极度忧愁、悲伤。\r\n西风；秋风\r\n黄花：菊花\r\n《醉花阴》白话翻译\r\n薄雾弥漫，云层浓密，烦恼白天太长，香料在金兽香炉中烧尽了。又到重阳佳节，洁白的玉枕，轻薄的纱帐中，半夜的凉气刚刚浸透。\r\n在东篱饮酒直到黄昏以后，淡淡的黄菊清香溢满双袖。别说不忧愁，西风卷起珠帘，闺中少妇比黄花更加消瘦。', '薄雾弥漫，云层浓密，烦恼白天太长，香料在金兽香炉中烧尽了。又到重阳佳节，洁白的玉枕，轻薄的纱帐中，半夜的凉气刚刚浸透。\r\n在东篱饮酒直到黄昏以后，淡淡的黄菊清香溢满双袖。别说不忧愁，西风卷起珠帘，闺中少妇比黄花更加消瘦。', '《醉花阴》的首二句就白昼来写。“薄雾浓云愁永昼”这“薄雾浓云”不仅布满整个天宇，更罩满词人心头。“瑞脑销金兽”，写出了时间的漫长无聊，同时又烘托出环境的凄寂。次三句从夜间着笔，“佳节又重阳”点明时令，也暗示心绪不好、心事重重的原因。常言道：“每逢佳节倍思亲”，今日里“佳节又重阳”，本应该是夫妻团圆、共同饮酒赏菊的，而如今只有自己，词人又怎能不更加思念远方的丈夫呢？一个“又”字，便充满了寂寞、怨恨、愁苦之感，所以，才会“玉枕纱厨，夜半凉初透”。“玉枕”，瓷枕。“纱厨”，即碧纱厨，以木架罩以绿色轻纱，内可置榻，用以避蚊。“玉枕纱厨”这样一些具有特征性的事物与词人特殊的感受中写出了透人肌肤的秋寒，暗示词中女主人公的心境。更何况，玉枕、纱厨往昔是与丈夫与共的，可如今自己却孤眠独寝，触景生情，自然是柔肠寸断心欲碎了。显然，这里的“凉”不只是身体肌肤所感之凉意，更是心灵所感之凄凉，是别有一番滋味在心头。“佳节又重阳，玉枕纱厨，半夜凉初透”，这三句写出了词人在重阳佳节孤眠独寝、夜半相思的凄苦之情。上片贯穿“永昼”与“一夜”的则是“愁”、“凉”二字。\r\n下片倒叙黄昏时独自饮酒的凄苦。“东篱把酒黄昏后，有暗香盈袖”，这两句写出了词人在重阳节傍晚于东篱下菊圃前把酒独酌的情景，衬托出词人无语独酌的离愁别绪。“东篱”，是菊圃的代称，化用了陶诗“采菊东篱下，悠然见南山。”“暗香”，菊花的幽香。“盈袖”，因饮酒时衣袖挥动，带来的香气充盈衣袖。古人在旧历九月九日这天，有赏菊饮酒的风习。唐诗人孟浩然《过故人庄》中就有“待到重阳日，还来就菊花”之句。宋时，此风不衰。所以重九这天，词人照样要“东篱把酒”直饮到“黄昏后”，菊花的幽香盛满了衣袖。重阳佳节，把酒赏菊，本来极富情趣。然而丈夫远游，词人孤寂冷清，不禁触景生情，菊花再美再香，也无法送给远方的亲人了；离愁别恨涌上心头，即便“借酒销愁”，亦是“愁更愁”了，又哪有心情欣赏这“暗香浮动”的菊花呢？深秋的节候、物态、人情，已宛然在目。佳节依旧，赏菊依旧，但人的情状却有所不同。这是构成“人比黄花瘦”的原因。“莫道不销魂，帘卷西风，人比黄花瘦”，末尾三句设想奇妙，比喻精彩。“消魂”极喻相思愁绝之情。“帘卷西风”即“西风卷帘”，暗含凄冷之意。匆匆离开东篱，回到闺房，瑟瑟西风把帘子掀起，人感到一阵寒意，联想到把酒相对的菊花，顿感人生不如菊花之意。上下对比，大有物是人非，今昔异趣之感。于是，末句“人比黄花瘦”，便成为千古绝唱。这三句直抒胸臆，写出了抒情主人公憔悴的面容和愁苦的神情，共同创造出一个凄清寂寥的深秋怀人的境界。这三句工稳精当，是作者艺术匠心之所在：先以“消魂”点神伤，再以“西风”点凄景，最后落笔结出一个“瘦”字。在这里，词人巧妙地将思妇与菊花相比，展现出两个迭印的镜头：一边是萧瑟的秋风摇撼着羸弱的瘦菊，一边是思妇布满愁云的憔悴面容，情景交融，创设出了一种凄苦绝伦的境界。\r\n全词开篇点“愁”，结句言“瘦”。“愁”是“瘦”的原因，“瘦”是“愁”的结果。贯穿全词的愁绪因“瘦”而得到了最集中最形象的体现。可以说，全篇画龙，结句点睛，“龙”画得巧，“睛”点得妙，巧妙结合，相映成辉，创设出了“情深深，愁浓浓” 的情境。在这首词里，虽然写的是思亲，但是却没有出现思亲或相思之苦的语句，而是用了叙事的方式，表达出深深的思亲的愁苦。显的很沉重高雅。古诗词中以花喻人瘦的作品屡见不鲜。如“人与绿杨俱瘦”（宋无名氏《如梦令》），“人瘦也，比梅花、瘦几分？”（宋程垓《摊破江城子》），“天还知道，和天也瘦。”（秦观《水龙吟》）等等。但比较起来却均未及李清照本篇写得这样成功。原因是，《醉花阴》这首词的比喻与全词的整体形象结合得十分紧密，比喻巧妙，极切合女词人的身份和情致，读之亲切。词的意境通过描述了重阳佳节作者把酒赏菊的情景，烘托了一种凄凉寂寥的氛围，表达了作者思念丈夫的寂寞与孤寂的心情。', '2016-06-13 19:31:13');

-- --------------------------------------------------------

--
-- 表的结构 `upload_calligraphy`
--

CREATE TABLE `upload_calligraphy` (
  `id` int(11) NOT NULL COMMENT '上传书画id',
  `user_name` varchar(25) NOT NULL COMMENT '用户名称',
  `pic_path` varchar(100) NOT NULL COMMENT '书画图片',
  `time` datetime NOT NULL COMMENT '上传时间',
  `bool_change` int(10) NOT NULL COMMENT '判断是否通过审核'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='上传书画表';

-- --------------------------------------------------------

--
-- 表的结构 `upload_music`
--

CREATE TABLE `upload_music` (
  `id` int(11) NOT NULL COMMENT '上传音乐id',
  `user_name` varchar(25) NOT NULL COMMENT '用户名称',
  `music_name` varchar(40) NOT NULL COMMENT '音乐名称',
  `pic_path` varchar(100) NOT NULL COMMENT '图片地址',
  `music_path` varchar(100) NOT NULL COMMENT '音乐地址',
  `singer` varchar(30) NOT NULL COMMENT '歌手',
  `writer` varchar(30) NOT NULL COMMENT '作词',
  `composer` varchar(30) NOT NULL COMMENT '作曲',
  `arranger` varchar(30) NOT NULL COMMENT '编曲',
  `lyric` text NOT NULL COMMENT '歌词',
  `time` datetime NOT NULL COMMENT '上传时间',
  `bool_change` int(10) NOT NULL COMMENT '判断是否通过的变量'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='上传音乐表';

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL COMMENT '用户id',
  `u_name` varchar(25) NOT NULL COMMENT '用户名',
  `u_password` varchar(128) NOT NULL COMMENT '用户密码',
  `u_email` varchar(25) NOT NULL COMMENT '用户邮件',
  `u_pic_path` varchar(100) NOT NULL COMMENT '用户头像',
  `introduce` text NOT NULL COMMENT '用户简介'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `writer`
--

CREATE TABLE `writer` (
  `id` int(11) NOT NULL COMMENT '作者id',
  `name` varchar(30) NOT NULL COMMENT '作者名字',
  `pic_path` varchar(100) NOT NULL COMMENT '作者图片',
  `class` varchar(100) NOT NULL COMMENT '类别',
  `all_admire_num` int(10) NOT NULL COMMENT '总点赞量'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `writer`
--

INSERT INTO `writer` (`id`, `name`, `pic_path`, `class`, `all_admire_num`) VALUES
(1, '温热感', 'source/photo/writer/duiyi1.jpg', '', 0),
(2, '苏轼', 'source/photo/poem/_1465045680.jpg', '诗词鉴赏', 12),
(4, '王昌龄', 'source/photo/poem/_1465052601.jpg', '诗词鉴赏', 3),
(7, '李清照', 'source/photo/poem/_1465053104.jpg', '诗词鉴赏', 3),
(8, '华志强', 'source/photo/writer/_1465056998.jpg', '陌上遗风', 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admire`
--
ALTER TABLE `admire`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- Indexes for table `artical`
--
ALTER TABLE `artical`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calligraphy`
--
ALTER TABLE `calligraphy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `writer` (`writer`);

--
-- Indexes for table `comments_artical`
--
ALTER TABLE `comments_artical`
  ADD PRIMARY KEY (`u_id`),
  ADD KEY `u_name` (`u_name`);

--
-- Indexes for table `comments_calli`
--
ALTER TABLE `comments_calli`
  ADD PRIMARY KEY (`u_id`),
  ADD KEY `u_name` (`u_name`);

--
-- Indexes for table `comments_music`
--
ALTER TABLE `comments_music`
  ADD PRIMARY KEY (`u_id`),
  ADD KEY `u_name` (`u_name`);

--
-- Indexes for table `comments_poem`
--
ALTER TABLE `comments_poem`
  ADD PRIMARY KEY (`u_id`),
  ADD KEY `u_name` (`u_name`);

--
-- Indexes for table `music`
--
ALTER TABLE `music`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poem`
--
ALTER TABLE `poem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upload_calligraphy`
--
ALTER TABLE `upload_calligraphy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_name` (`user_name`);

--
-- Indexes for table `upload_music`
--
ALTER TABLE `upload_music`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_name` (`user_name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `u_name` (`u_name`);

--
-- Indexes for table `writer`
--
ALTER TABLE `writer`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `admire`
--
ALTER TABLE `admire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '点赞id', AUTO_INCREMENT=6;
--
-- 使用表AUTO_INCREMENT `artical`
--
ALTER TABLE `artical`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '文章id', AUTO_INCREMENT=6;
--
-- 使用表AUTO_INCREMENT `calligraphy`
--
ALTER TABLE `calligraphy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '书画id', AUTO_INCREMENT=14;
--
-- 使用表AUTO_INCREMENT `comments_artical`
--
ALTER TABLE `comments_artical`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户评论id', AUTO_INCREMENT=18;
--
-- 使用表AUTO_INCREMENT `comments_calli`
--
ALTER TABLE `comments_calli`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户评论id', AUTO_INCREMENT=15;
--
-- 使用表AUTO_INCREMENT `comments_music`
--
ALTER TABLE `comments_music`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户评论id', AUTO_INCREMENT=21;
--
-- 使用表AUTO_INCREMENT `comments_poem`
--
ALTER TABLE `comments_poem`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户评论id', AUTO_INCREMENT=10;
--
-- 使用表AUTO_INCREMENT `music`
--
ALTER TABLE `music`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '音乐id', AUTO_INCREMENT=36;
--
-- 使用表AUTO_INCREMENT `poem`
--
ALTER TABLE `poem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '古诗id', AUTO_INCREMENT=20;
--
-- 使用表AUTO_INCREMENT `upload_calligraphy`
--
ALTER TABLE `upload_calligraphy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '上传书画id', AUTO_INCREMENT=17;
--
-- 使用表AUTO_INCREMENT `upload_music`
--
ALTER TABLE `upload_music`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '上传音乐id', AUTO_INCREMENT=18;
--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户id', AUTO_INCREMENT=26;
--
-- 使用表AUTO_INCREMENT `writer`
--
ALTER TABLE `writer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '作者id', AUTO_INCREMENT=9;
--
-- 限制导出的表
--

--
-- 限制表 `admire`
--
ALTER TABLE `admire`
  ADD CONSTRAINT `admire_ibfk_1` FOREIGN KEY (`user_name`) REFERENCES `user` (`u_name`);

--
-- 限制表 `calligraphy`
--
ALTER TABLE `calligraphy`
  ADD CONSTRAINT `calligraphy_ibfk_1` FOREIGN KEY (`writer`) REFERENCES `user` (`u_name`);

--
-- 限制表 `comments_artical`
--
ALTER TABLE `comments_artical`
  ADD CONSTRAINT `comments_artical_ibfk_1` FOREIGN KEY (`u_name`) REFERENCES `user` (`u_name`);

--
-- 限制表 `comments_calli`
--
ALTER TABLE `comments_calli`
  ADD CONSTRAINT `comments_calli_ibfk_1` FOREIGN KEY (`u_name`) REFERENCES `user` (`u_name`);

--
-- 限制表 `comments_music`
--
ALTER TABLE `comments_music`
  ADD CONSTRAINT `comments_music_ibfk_1` FOREIGN KEY (`u_name`) REFERENCES `user` (`u_name`);

--
-- 限制表 `comments_poem`
--
ALTER TABLE `comments_poem`
  ADD CONSTRAINT `comments_poem_ibfk_1` FOREIGN KEY (`u_name`) REFERENCES `user` (`u_name`);

--
-- 限制表 `upload_calligraphy`
--
ALTER TABLE `upload_calligraphy`
  ADD CONSTRAINT `upload_calligraphy_ibfk_1` FOREIGN KEY (`user_name`) REFERENCES `user` (`u_name`);

--
-- 限制表 `upload_music`
--
ALTER TABLE `upload_music`
  ADD CONSTRAINT `upload_music_ibfk_1` FOREIGN KEY (`user_name`) REFERENCES `user` (`u_name`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
