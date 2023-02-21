<?php
namespace SysArrays;

class ContestArray{
    public $contest;
    public function __construct(){
        $this->contest = array(
 "id" => ":id",
 "active" => ":active",
 "featured" => ":featured",
 "contest_u_id" => ":contest_u_id",
 "contest_name" => ":contest_name",
 "contest_sub_name" => ":contest_sub_name",
 "contest_short_description" => ":contest_short_description",
 "contest_description" => ":contest_description",
 "contest_photo" => ":contest_photo",
 "contest_photo_image" => ":contest_photo_image",
 "contest_max_votes" => ":contest_max_votes",
 "contest_max_votes_per_photo" => ":contest_max_votes_per_photo",
 "contest_award" => ":contest_award",
 "contest_award_name" => ":contest_award_name",
 "contest_award_sub_name" => ":contest_award_sub_name",
 "contest_award_description" => ":contest_award_description",
  "contest_award_short_description" => ":contest_award_short_description",
 "contest_award_photo" => ":contest_award_photo",
 "contest_sponsor" => ":contest_sponsor",
 "contest_sponsor_name" => ":contest_sponsor_name",
 "contest_sponsor_sub_name" => ":contest_sponsor_sub_name",
 "contest_sponsor_logo" => ":contest_sponsor_logo",
 "contest_sponsor_short_description" => ":contest_sponsor_short_description",
 "contest_sponsor_description" => ":contest_sponsor_description",
 "contest_sponsor_website" => ":contest_sponsor_website",
 "contest_author" => ":contest_author",
 "contest_author_address" => ":contest_author_address",
 "full_start" => ":full_start",
 "full_end" => ":full_end",
 "start_date" => ":start_date",
 "end_date" => ":end_date",
 "portrait_landscape" => ":portrait_landscape",
 "p_l_height" => ":p_l_height",
 "p_l_width" => ":p_l_width",
 "p_p_height" => ":p_p_height",
 "p_p_width" => ":p_p_width"
);
    }

    public function contestArray(){
      return $this->contest;
    }// createContest



}// class ends
