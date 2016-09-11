<?php

use App\Models\Answer;
use App\Models\Group;
use App\Models\Question;
use App\Models\Survey;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $answer_scales = [
            "satisfied" => [
                1 => [
                    "very-dissatisfied",
                    "Very dissatisfied",
                ],
                2 => [
                    "dissatisfied",
                    "Dissatisfied",
                ],
                3 => [
                    "neither",
                    "Neither satisfied nor dissatisfied",
                ],
                4 => [
                    "satisfied",
                    "Satisfied",
                ],
                5 => [
                    "very-satisfied",
                    "Very satisfied",
                ],
            ],
            "employment" => [
                1 => [
                    "employed",
                    "Employed",
                ],
                2 => [
                    "unemployed",
                    "Unemployed",
                ],
                3 => [
                    "retired",
                    "Retired",
                ],
                4 => [
                    "student",
                    "Student",
                ],
            ],
            "disability" => [
                1 => [
                    "no-known-disability",
                    "No known disability",
                ],
                2 => [
                    "specific-learning-difficulty",
                    "Specific learning difficulty (such as dyslexia)",
                ],
                3 => [
                    "autism-spectrum-condition",
                    "Autism spectrum condition",
                ],
                4 => [
                    "mobility-impairment",
                    "Mobility impairment",
                ],
                5 => [
                    "sensory-impairment",
                    "Sensory impairment",
                ],
                6 => [
                    "long-term-physical-health-condition",
                    "Long term physical health condition",
                ],
                7 => [
                    "long-term-mental-health-condition",
                    "Long term mental health condition",
                ],
            ],
        ];

        $questions = [
            "Overall, how satisfied are you with your work?" => [
                "type" => "list_radio",
                "answer_options" => true,
                "answers" => $answer_scales["satisfied"],
            ],
            "Disability" => [
                "type" => "list_radio",
                "answer_options" => true,
                "answers" => $answer_scales["disability"],
            ],
            "Do you have a friend or family member with whom you can discuss personal matters?" => [
                "type" => "yes_no",
                "answer_options" => false,
            ],
            "What could the Uni stop doing to improve well-being?" => [
                "type" => "huge_free_text",
                "answer_options" => false,
            ],
            "Age" => [
                "type" => "list_radio",
                "answer_options" => false,
            ],
            "Employment status" => [
                "type" => "dropdown",
                "answer_options" => true,
                "answers" => $answer_scales["employment"],
            ],
            "Email" => [
                "type" => "short_free_text",
                "answer_options" => false,
            ],
            "Gender" => [
                "type" => "gender",
                "answer_options" => false,
            ],
        ];

        $array_questions = [
            "How do you feel about the following example array questions?" => [
                "sub_questions" => [
                    "I’ve been feeling great",
                    "I’ve been exercising regularly",
                    "Something else",
                ],
                "sub_answers" => [
                    1 => [
                        "very-dissatisfied",
                        "Very dissatisfied",
                    ],
                    2 => [
                        "dissatisfied",
                        "Dissatisfied",
                    ],
                    3 => [
                        "neither",
                        "Neither satisfied nor dissatisfied",
                    ],
                    4 => [
                        "satisfied",
                        "Satisfied",
                    ],
                    5 => [
                        "very-satisfied",
                        "Very satisfied",
                    ],
                ],
            ],
        ];

        Model::unguard();

        $faker = Faker::create('en_GB');
        foreach (range(1,3) as $index) {
            $title = $faker->sentence(5, true);
            $survey = new Survey;
            $survey->slug = str_slug($title, '-');
            $survey->title = $title;
            $survey->description = $faker->paragraph(1, true);
            $survey->welcome_text = $faker->paragraph(10, true);
            $survey->end_text = $faker->paragraph(4, true);
            $survey->end_url = $faker->url;
            $survey->admin_name = $faker->name;
            $survey->admin_email = strtolower($faker->email);
            $survey->allow_registration = $faker->boolean;
            $survey->active = $faker->boolean;
            $survey->anonymized = $faker->boolean;
            $survey->starts_at = $faker->dateTimeBetween('-1 year', 'now');
            $survey->expires_at = $faker->dateTimeBetween('now', '1 year');
            $survey->save();

            foreach (range(1,3) as $index) {
                $group = new Group;
                $title = $faker->sentence(6, true);
                $group->survey_id = $survey->id;
                $group->slug = str_slug($title, '-');
                $group->title = $title;
                $group->description = $faker->paragraph(1, true);
                $group->order = $faker->numberBetween(1, 99);
                $group->save();

                // create some questions
                foreach ($questions as $the_question => $values) {
                    $question = new Question;
                    $question->parent_question_id = null;
                    $question->group_id = $group->id;
                    $question->title = $the_question;
                    $question->description = $faker->sentence;
                    $question->type = $values["type"];
                    $question->order = $faker->numberBetween(1, 99);
                    $question->mandatory = $faker->boolean;
                    $question->save();

                    if($values["answer_options"]) {
                        foreach ($values["answers"] as $value => $answer_array) {
                            $answer = new Answer;
                            $answer->question_id = $question->id;
                            $answer->value = $value;
                            $answer->code = (string) $answer_array[0];
                            $answer->answer_text = (string) $answer_array[1];
                            $answer->visable = true;
                            $answer->order = $faker->numberBetween(1, 99);
                            $answer->save();
                        }
                    }
                }

                // some array questions
                foreach ($array_questions as $main_question => $array_question_attributes) {
                    $question = new Question;
                    $question->parent_question_id = null;
                    $question->group_id = $group->id;
                    $question->title = $main_question;
                    $question->description = $faker->sentence;
                    $question->type = "array";
                    $question->order = $faker->numberBetween(1, 99);
                    $question->mandatory = $faker->boolean;
                    $question->save();

                    foreach ($array_questions as $main_question => $array_question_attributes) {
                        foreach ($array_question_attributes["sub_questions"] as $sub_question) {
                            $new_sub_question = new Question;
                            $new_sub_question->parent_question_id = $question->id;
                            $new_sub_question->group_id = $group->id;
                            $new_sub_question->title = $sub_question;
                            $new_sub_question->description = $faker->sentence;
                            $new_sub_question->order = $faker->numberBetween(1, 99);
                            $new_sub_question->mandatory = $faker->boolean;
                            $new_sub_question->save();
                        }

                        foreach ($array_question_attributes["sub_answers"] as $sub_answer_value => $sub_answer_array) {
                            $sub_answer = new Answer;
                            $sub_answer->question_id = $question->id;
                            $sub_answer->value = $sub_answer_value;
                            $sub_answer->code = (string) $sub_answer_array[0];
                            $sub_answer->answer_text = (string) $sub_answer_array[1];
                            $sub_answer->visable = true;
                            $sub_answer->order = $faker->numberBetween(1, 99);
                            $sub_answer->save();
                        }
                    }
                }
            }
        }
    }
}
