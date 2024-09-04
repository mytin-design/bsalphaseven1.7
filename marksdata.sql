-- To host marksdata such as grade, stream, term, type, and rubrics
-- This ensures that rubrics entered are for the specified grade, term, and exam type


CREATE TABLE `marksdata` (
    `grade` varchar(255) NOT NULL,
    `stream` varchar(255) NOT NULL,
    `year` varchar(255) NOT NULL,
    `term` varchar(255) NOT NULL,
    `type` varchar(255) NOT NULL,
    `rubricname` varchar(255) NOT NULL,
    `subjectname` varchar(255) NOT NULL,
    `fromee` varchar(255) NOT NULL,
    `toee` varchar(255) NOT NULL,
    `fromme` varchar(255) NOT NULL,
    `tome` varchar(255) NOT NULL,
    `fromae` varchar(255) NOT NULL,
    `toae` varchar(255) NOT NULL,
    `frombe` varchar(255) NOT NULL,
    `tobe` varchar(255) NOT NULL
)